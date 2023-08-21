<div class="d-flex align-items-center mt-2">
    <span class="badge bg-light-info">{{getLoggedinPatient()  ?  $row->opd_count  : count($row->patient->opd)}}</span>
</div>


