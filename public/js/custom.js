$(document).on('click', '.btn-modal', function(e) {
                    e.preventDefault();
                    var container = '#ajax_modal';
                    $.ajax({
                        url: $(this).data('href'),
                        dataType: 'html',
                        success: function(result) {
                            $(container)
                                .html(result)
                                .modal('show');
                        },
                    });
                });

                $(document).on('submit', 'form#ajax_form', function(e) {
                    e.preventDefault();
                    var ref = $(this);
                    ref.find('span.md-line').html('');
                    ref.find('input[type="submit"]').attr('disabled', true);
                    $.ajax({
                        method: 'POST',
                        url: ref.attr('action'),
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('.ajax_loader').removeClass('d-none');
                        },
                        success: function(result) {
                            $('.ajax_loader').addClass('d-none');
                            if (result.success === true) {
                                toastr.success(result.msg);
                                // data_table.ajax.reload();
                                $('#data_table').DataTable().ajax.reload();
                                $('#ajax_modal').modal('hide');
                            } else {
                                toastr.error(result.msg);
                                console.log(result.msg);
                            }
                            $('#ajax_form').find('input[type="submit"]').attr('disabled', false);

                        },
                        error: function(data) {
                            $('.ajax_loader').addClass('d-none');
                            var response = JSON.parse(data.responseText);
                            $.each(response.errors, function(key, value) {
                                $('#' + key + '_error').html(value);
                            });
                            $('#ajax_form').find('input[type="submit"]').attr('disabled', false);

                        },
                    });
                });
