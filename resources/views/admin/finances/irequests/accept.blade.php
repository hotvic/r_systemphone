<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
        <form action="{{ route('admin.irequests.setstatus', ['id' => $request->id]) }}" method="POST" id="acceptform">
            {!! csrf_field() !!}

            <input type="hidden" name="status" value="1">

            <div class="form-group">
                <label for="response">Mensagem</label>
                <input class="form-control" type="text" name="response" value="">
            </div>

            <button type="submit" class="btn btn-success btn-block">Aceitar</button>
        </form>
        <script type="text/javascript">
            $('#acceptform').on('submit', function (e) {
                e.preventDefault();

                var data = $(this).serializeArray();

                $.post($(this).attr('action'), data, function (ret) {
                    var serverResponseEvent = new CustomEvent('serverResponse');
                    document.dispatchEvent(serverResponseEvent);
                });
            });
        </script>
    </div>
</div>