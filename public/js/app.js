(function() {
  $(document).ready(function() {
    $('.delete-confirmation').confirmation({
      btnOkLabel: 'Apagar',
      btnCancelClass: 'Cancelar',
      singleton: true,
      popout: true,
      title: 'Você tem Certeza?',
      placement: 'top'
    });
    return $('[data-toggle=plot]').each(function() {
      var $self, chart, ctx;
      $self = $(this);
      if ($self.data('plot-type') === 'line-neutral') {
        ctx = $self.get(0).getContext('2d');
        return chart = new Chart(ctx).Line({
          datasets: [
            {
              fillColor: '#CCCCCC',
              strokeColor: '#757575',
              data: $self.data('plot-data')
            }
          ]
        });
      }
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map
