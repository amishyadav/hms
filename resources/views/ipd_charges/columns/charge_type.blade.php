@if ($row->charge_type_id === 1)
    Procedures
@elseif ($row->charge_type_id  === 2)
    Investigations
@elseif ($row->charge_type_id  === 3)
    Supplier
@elseif ($row->charge_type_id === 4)
    Operation Theatre
@else
    Others
@endif
