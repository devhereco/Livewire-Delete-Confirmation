<?php

namespace devhereco\LivewireConfirmDelete;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConfirmDeleteComponent extends Component
{
    use LivewireAlert;

    protected $selectedModelItemToDestroy;
    
    public function destroy($item)
    {
        $this->selectedModelItemToDestroy = $this->model::find($item);
        
        $this->alert('warning', __('ConfirmDelete::ConfirmDelete.delete_title'), [
            'position'              => 'center',
            'timer'                 => '',
            'toast'                 => false,
            'showConfirmButton'     => true,
            'onConfirmed'           => 'confirmDestroy',
            'showCancelButton'      => true,
            'onDismissed'           => '',
            'text'                  => __('ConfirmDelete::ConfirmDelete.deleting_note'),
            'cancelButtonText'      => __('ConfirmDelete::ConfirmDelete.cancel'),
            'confirmButtonText'     => __('ConfirmDelete::ConfirmDelete.delete'),
        ]);
    }

    public function confirmDestroy()
    {
        try {
            $this->selectedModelItemToDestroy->delete();

            $this->alert('success', __('ConfirmDelete::ConfirmDelete.success_destroy'), [
                'toast'             => false,
                'position'          => 'top-end'
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', __('ConfirmDelete::ConfirmDelete.failed_deleting'), [
                'toast'             => false,
                'position'          => 'top-end'
            ]);
        }
    }
}