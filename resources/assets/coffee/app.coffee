
$(document).ready(() ->
  
  $('.delete-confirmation').confirmation({
    btnOkLabel: 'Apagar',
    btnCancelClass: 'Cancelar',
    singleton: true,
    popout: true,
    title: 'Você tem Certeza?',
    placement: 'top'
  })

  $('[data-toggle=plot]').each(() ->
    $self = $(this)

    if $self.data('plot-type') == 'line-neutral'
      ctx = $self.get(0).getContext('2d')

      chart = new Chart(ctx).Line({
        datasets: [
          {
            fillColor: '#CCCCCC',
            strokeColor: '#757575',
            data: $self.data('plot-data')
          }
        ]
      })
  )
)
