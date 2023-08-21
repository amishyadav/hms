<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Medicine;

class MedicineCategoryDetailTable extends LivewireTableComponent
{
    protected $model = Medicine::class;
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];
    public $categoryDetails;

    public function mount(string $categoryDetails): void
    {
        $this->categoryDetails = $categoryDetails;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
//            ->setDefaultSort('created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setThAttributes(function(Column $column) {
            if ($column->isField('selling_price')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('buying_price')) {
                return [
                    'class' => 'price-column',
                    'style' => 'padding-right:25px !important',
                ];
            }
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.medicine.medicine'), "name")
                ->sortable(),
            Column::make(__('messages.medicine.brand'), "brand_id")
                ->hideIf('brand_id'),
            Column::make(__('messages.medicine.brand'), "brand.name")
                ->view('categories.columns.detail_columns.brand')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.medicine.description'), "description")
                ->searchable()
                ->sortable()
                ->view('categories.columns.detail_columns.description'),
            Column::make(__('messages.medicine.selling_price'), "selling_price")
                ->searchable()
                ->view('categories.columns.detail_columns.selling_price')
                ->sortable(),
            Column::make(__('messages.medicine.buying_price'), "buying_price")
                ->searchable()
                ->view('categories.columns.detail_columns.buying_price')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        /** @var Medicine $query */

        $query = Medicine::with('category','brand')->where('category_id',$this->categoryDetails);

        return $query;
    }
}
