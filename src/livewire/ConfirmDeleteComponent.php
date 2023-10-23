<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConfirmDeleteComponent extends Component
{
    use LivewireAlert;

    protected $selectedModelItemToDestroy;
    
    public function destroy($item)
    {
        $this->selectedModelItemToDestroy = $this->model::find($item);
        
        $this->alert('warning', trans('LivewireConfirmDelete::ConfirmDelete.delete_title'), [
            'position'              => 'center',
            'timer'                 => '',
            'toast'                 => false,
            'showConfirmButton'     => true,
            'onConfirmed'           => 'confirmDestroy',
            'showCancelButton'      => true,
            'onDismissed'           => '',
            'text'                  => trans('LivewireConfirmDelete::ConfirmDelete.deleting_note'),
            'cancelButtonText'      => trans('LivewireConfirmDelete::ConfirmDelete.cancel'),
            'confirmButtonText'     => trans('LivewireConfirmDelete::ConfirmDelete.delete'),
        ]);
    }

    public function confirmDestroy()
    {
        try {
            $this->selectedModelItemToDestroy->delete();

            $this->alert('success', trans('LivewireConfirmDelete::ConfirmDelete.success_destroy'), [
                'toast'             => false,
                'position'          => 'top-end'
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', trans('LivewireConfirmDelete::ConfirmDelete.failed_deleting'), [
                'toast'             => false,
                'position'          => 'top-end'
            ]);
        }
    }
}