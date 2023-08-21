<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Enquiry;

class EnquiryTable extends LivewireTableComponent
{
    protected $model = Enquiry::class;
    public $showFilterOnHeader = true;
    public $showButtonOnHeader = false;
    public $paginationIsEnabled = true;
    public $FilterComponent = ['enquiries.filter-button', Enquiry::STATUS_ARR];
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }


    /**
     *
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('enquiries.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    /**
     *
     *
     * @return array
     */
    public function columns(): array
    {
        return [
                Column::make("id", "id")
                    ->hideIf('id'),
                Column::make(__('messages.profile.full_name'), "full_name")
                    ->view('enquiries.columns.full_name')
                    ->searchable()
                    ->sortable(),
                Column::make(__('messages.profile.email'), "email")
                    ->searchable()
                    ->hideIf('email')
                    ->sortable(),
                Column::make(__('messages.profile.type'), "type")
                    ->view('enquiries.columns.type')
                    ->sortable(),
                Column::make(__('messages.common.created_at'), "created_at")
                    ->view('enquiries.columns.date')
                    ->sortable(),
                Column::make(__('messages.enquiry.viewed_by'), "viewed_by")
                    ->view('enquiries.columns.viewed_by')
                    ->sortable(),
                Column::make(__('messages.common.status'), "status")
                    ->view('enquiries.columns.status'),
                Column::make(__('messages.common.action'), "id")->view('enquiries.action'),
                
        ];
    }

    /**
     *
     *
     * @return Builder
     */
    public function builder(): Builder
    {
        /** @var Enquiry $query */
        $query = Enquiry::query()->select('enquiries.*')->with('user');
        $query->when(isset($this->statusFilter), function (Builder $q) {
            if($this->statusFilter == 2){
                $q;
            }else{
                $q->where('status', $this->statusFilter);
            }
        });
        return $query;
    }
}
