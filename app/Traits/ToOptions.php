<?php

namespace App\Traits;

use App\Models\User\Role;
use Illuminate\Database\Eloquent\Model;

/**
 * @method orderBy(string $value)
 */
trait ToOptions
{
    public function toOptions(
        string       $key = 'id',
        string|array $value = 'title',
        string       $emptyOption = 'Scegli...',
        bool         $enableEmptyOption = false,
        ?string      $orderBy = null,
        ?callable    $customMap = null
    ): array
    {
        /**
         * @var Model $this
         */
        if (is_string($value)) {
            $value = [$value];
        }
        $options = [];
        if ($enableEmptyOption) {
            $options[] = [
                'value' => 0,
                'name' => $emptyOption
            ];
        }
        return array_merge(
            $options,
            $this->orderBy($orderBy ?? $value[array_key_first($value)])
                ->get(['id', ...$value])
                ->map(is_callable($customMap) ? $customMap : fn($element) => [
                    'value' => $element->$key,
                    'name' => implode(' ',
                        array_map(function (string $prop) use ($element) {
                            return $element->$prop;
                        }, $value)
                    )
                ])->toArray());
    }
}
