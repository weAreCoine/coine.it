<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


trait GetModelTableStructure {

    /**
     * @throws Exception
     */
    public function getTableStructure(): array {
        if ( ! in_array( Model::class, class_parents( $this ) ) ) {
            throw new Exception( 'This trait can be used only in Models' );
        }
        $tableStructure = [];
        foreach ( Schema::getColumnListing( $this->getModel()->getTable() ) as $column ) {
            $tableStructure[ $column ] = Schema::getColumnType( $this::getModel()->getTable(), $column );
        }

        return $tableStructure;
    }
}
