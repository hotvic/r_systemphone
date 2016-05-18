<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
        <form action="{{ route('admin.wrequests.setstatus', ['id' => $request->id]) }}" method="POST" id="rejectform">
            {!! csrf_field() !!}

            <input type="hidden" name="status" value="2">

            <div class="form-group">
                <label for="response">Mensagem</label>
                <input class="form-control" type="text" name="response" value="">
            </div>

            <button type="submit" class="btn btn-danger btn-block">Rejeitar</button>
        </form>
        <script type="text/javascript">
            $('#rejectform').on('submit', function (e) {
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