<div class="col-md-2 nopadding">
    <div class="well">
        <div>
            <ul class="nav">
                <li>
                    <label class="tree-toggle nav-header">Investimentos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('user.irequests.create') }}">Investir</a>
                        </li>
                        <li>
                            <a href="{{ route('user.investments.index') }}">Investimentos</a>
                        </li>
                        <li>
                            <a href="{{ route('user.irequests.index') }}">Pendentes</a>
                        </li>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <label class="tree-toggle nav-header">Ganhos</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('user.earnings.index') }}">Ganhos</a>
                        </li>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <label class="tree-toggle nav-header">Saques</label>
                    <ul class="nav tree">
                        <li>
                            <a href="{{ route('user.wrequests.create') }}">Fazer Saque</a>
                        </li>
                        <li>
                            <a href="{{ route('user.withdrawals.index') }}">Saques</a>
                        </li>
                        <li>
                            <a href="{{ route('user.wrequests.index') }}">Pendentes</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>