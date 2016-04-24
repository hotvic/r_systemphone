<div class="col-md-2 nopadding">
    <div class="well">
        <div>
            <ul class="nav">
                <li>
                    <label class="tree-toggle nav-header">Investimentos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('admin::finances::investments::new') }}">Criar Novo</a>
                        </li>
                        <li>
                            <a href="{{ route('admin::finances::investments::index') }}">Investimentos</a>
                        </li>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <label class="tree-toggle nav-header">Ganhos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('admin::finances::earnings::new') }}">Criar Novo</a>
                        </li>
                        <li>
                            <a href="{{ route('admin::finances::earnings::index') }}">Ganhos</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>