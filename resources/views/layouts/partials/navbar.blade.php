<div class="sidebar-nav">
    <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item {{ Request::segment(1) == 'rekening' ? 'active' : null }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" 
               href="{{ url('/rekening') }}" 
               aria-expanded="false">
               <i class="mdi mdi-view-dashboard"></i>
               <span class="hide-menu">Rekening</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::segment(1) == 'jurnal' ? 'active' : null }}">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" 
               href="{{ url('/jurnal') }}" 
               aria-expanded="false">
               <i class="mdi mdi-view-dashboard"></i>
               <span class="hide-menu">Jurnal</span>
            </a>
        </li>
    </ul>
</div>