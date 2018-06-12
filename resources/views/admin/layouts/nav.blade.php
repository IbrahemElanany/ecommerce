<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-cogs pull-right"></i>
        <p>
            إعدادات الموقع
        </p>
        <i class="right fa fa-angle-left" style="margin-right: 50px" ></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/adminpanel/sitesetting')}}" class="nav-link">
                <i class="fa fa-wrench nav-icon"></i>
                <p>الإعدادات الرئيسية</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-hashtag nav-icon"></i>
                <p>إعدادات أخري</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-users pull-right"></i>
        <p>
            التحكم في الأعضاء
        </p>
        <i class="right fa fa-angle-left" style="margin-right: 40px"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/adminpanel/users/create')}}" class="nav-link">
                <i class="fa fa-plus nav-icon"></i>
                <p>إضافة عضو</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/adminpanel/users')}}" class="nav-link">
                <i class="fa fa-hashtag nav-icon"></i>
                <p>كل الأعضاء</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-home pull-right"></i>
        <p>
            التحكم في العقارات
        </p>
        <i class="right fa fa-angle-left" style="margin-right: 40px"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('/adminpanel/bu/create')}}" class="nav-link">
                <i class="fa fa-plus nav-icon"></i>
                <p>إضافة عقار</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/adminpanel/bu')}}" class="nav-link">
                <i class="fa fa-hashtag nav-icon"></i>
                <p>كل العقارات</p>
            </a>
        </li>
    </ul>
</li>