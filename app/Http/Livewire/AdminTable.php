<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminTable extends LivewireTableComponent
{
    protected $model = User::class;
    public $showButtonOnHeader = true;
    public $buttonComponent = 'admins.add-button';
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('users.created_at', 'desc')
            ->setQueryStringStatus(false);;
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), "first_name")
                ->sortable()
                ->searchable()
                ->view('admins.columns.name'),
            Column::make(__('messages.user.phone'), "phone")
                ->sortable()
                ->searchable()
                ->view('admins.columns.phone'),
            Column::make(__('messages.user.email'), "email")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('admins.action')
        ];
    }

    public function builder(): Builder
    {
        /** @var User $query */
        $query = User::whereHas('roles', function ($q) {
            $q->where('name', 'Super Admin');
        })->with(['roles', 'media'])->where('users.id', '!=', getLoggedInUserId())->select('users.*');

        return $query;
    }
}
