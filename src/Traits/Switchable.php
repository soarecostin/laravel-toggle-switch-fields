<?php

namespace SoareCostin\LaravelToggleSwitchFields\Traits;

trait Switchable
{
    protected function switchableFields()
    {
        return [
            config('toggle_switch_fields.default_field'),
        ];
    }

    /**
     * Switch the current resource on.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $entity
     * @param  string $fieldName
     * @return
     */
    public function switchOn($entity, $fieldName)
    {
        if (! in_array($fieldName, $this->switchableFields())) {
            abort(404);
        }

        $success = $entity->update([$fieldName => 1]);

        return response()->json([
            'ok' => $success,
        ]);
    }

    /**
     * Switch the current resource off.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $entity
     * @param  string $fieldName
     * @return
     */
    public function switchOff($entity, $fieldName)
    {
        if (! in_array($fieldName, $this->switchableFields())) {
            abort(404);
        }

        $success = $entity->update([$fieldName => 0]);

        return response()->json([
            'ok' => $success,
        ]);
    }
}
