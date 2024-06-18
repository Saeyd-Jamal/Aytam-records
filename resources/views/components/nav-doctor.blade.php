<ul class="side-menu">
    <li class="side-item side-item-category">المرضى</li>
    <div id="nav_appointments">
        @foreach($appointments as $appointment )
            <li class="slide">
                <a class="nav-link side-menu__item" href="{{route('doctor.appointment.edit',$appointment->id)}}">
                    <span class="side-menu__label">{{$appointment->patient->name}}</span>
                    @if ($appointment->status == "تم العلاج")
                    <span class="badge badge-success side-badge">
                        <i class="fas fa-tags nav-icon"></i>
                    </span>
                    @elseif ($appointment->status == "مدفوع")
                    <span class="badge badge-info side-badge">
                        <i class="fas fa-tags nav-icon"></i>
                    </span>
                    @elseif ($appointment->status == "غير مدفوع")
                    <span class="badge badge-danger side-badge">
                        <i class="fas fa-tags nav-icon"></i>
                    </span>
                    @endif
                </a>
            </li>
        @endforeach
    </div>
</ul>
