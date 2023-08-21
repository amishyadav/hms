<?php

namespace App\Http\Livewire;

use App\Models\AdminTestimonial;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminTestimonialTable extends LivewireTableComponent
{
    protected $model = AdminTestimonial::class;
    public $showFilterOnHeader = false;
    public $showButtonOnHeader = true;
    public $paginationIsEnabled = true;
    public $buttonComponent = 'landing.testimonial.add-button';
    protected $listeners = ['refresh' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('admin_testimonials.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.profile'), "id")
                ->view('landing.testimonial.columns.profile'),
            Column::make(__('messages.testimonial.name'), "name")
                ->sortable()
                ->searchable()
                ->view('landing.testimonial.columns.name'),
            Column::make(__('messages.testimonial.position'), "position")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.testimonial.description'), "description")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('landing.testimonial.columns.action'),
        ];
    }

    public function builder(): Builder
    {
        return AdminTestimonial::query()->select('admin_testimonials.*');
    }
}
