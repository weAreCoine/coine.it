<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method getKeyName()
 * @method getAttribute( mixed $keyName )
 */
trait HasCompositePrimaryKey {

    /**
     * Set the keys for a save update query.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    protected function setKeysForSaveQuery( $query ): Builder {
        $keys = $this->getKeyName();

        if ( ! is_array( $keys ) ) {
            return parent::setKeysForSaveQuery( $query );
        }

        foreach ( $keys as $keyName ) {
            $query->where( $keyName, '=', $this->getKeyForSaveQuery( $keyName ) );
        }

        return $query;
    }


    /**
     * Get the primary key value for a save query.
     *
     * @param mixed|null $keyName
     *
     * @return mixed
     */
    protected function getKeyForSaveQuery( mixed $keyName = null ): mixed {
        if ( is_null( $keyName ) ) {
            $keyName = $this->getKeyName();
        }

        if ( isset( $this->original[ $keyName ] ) ) {
            return $this->original[ $keyName ];
        }

        return $this->getAttribute( $keyName );
    }

}
