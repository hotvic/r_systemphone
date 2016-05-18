<div class="col-md-2 nopadding">
    <div class="well">
        <div>
            <ul class="nav">
                <li>
                    <label class="tree-toggle nav-header">Investimentos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('admin.investments.create') }}">Criar Novo</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.investments.index') }}">Investimentos</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.irequests.index') }}">Pedidos Pendentes</a>
                        </li>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <label class="tree-toggle nav-header">Ganhos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('admin.earnings.create') }}">Criar Novo</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.earnings.index') }}">Ganhos</a>
                        </li>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <label class="tree-toggle nav-header">Saques</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('admin.withdrawals.create') }}">Criar Novo</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.withdrawals.index') }}">Saques</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.wrequests.index') }}">Pedidos Pendentes</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>