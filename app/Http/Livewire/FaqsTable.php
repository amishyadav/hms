<?php

namespace App\Http\Livewire;

use App\Models\Faqs;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FaqsTable extends LivewireTableComponent
{
    protected $model = Faqs::class;
    public $showFilterOnHeader = false;
    public $showButtonOnHeader = true;
    public $paginationIsEnabled = true;
    public $buttonComponent = 'landing.faqs.add-button';
    protected $listeners = ['refresh' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('faqs.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.faqs.question'), "question")
                ->sortable()
                ->searchable()
                ->view('landing.faqs.columns.question'),
            Column::make(__('messages.faqs.answer'), "answer")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('landing.faqs.columns.action'),
        ];
    }

    public function builder(): Builder
    {
        return Faqs::query()->select('faqs.*');
    }
}
