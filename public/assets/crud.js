function store(url, data) {
    // console.log(data);
    axios.post(url, data)
        .then(function (response) {
            // showMessage(response.data);

            clearForm();
            $('#kt_datatable_example_5').DataTable().ajax.reload();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success("تمت الاضافة بنجاح");
            // clearAndHideErrors();

        })
        .catch(function (error) {
            console.log(error.response.data.errors);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(error.response.data.errors);
            // if (error.response.data.errors !== undefined) {
            //     showErrorMessages(error.response.data.errors);
            // } else {

            //     showMessage(error.response.data);
            // }
        });
}


function qusay(url, data, redirectUrl) {
    axios.post(url, data)
        .then(function (response) {
            // showMessage(response.data);
            // console.log(response.data);
            window.location.href = redirectUrl;
            // clearForm();
            // $('#kt_datatable_example_5').DataTable().ajax.reload();
            // toastr.options = {
            //     "closeButton": false,
            //     "debug": false,
            //     "newestOnTop": false,
            //     "progressBar": false,
            //     "positionClass": "toastr-top-left",
            //     "preventDuplicates": false,
            //     "onclick": null,
            //     "showDuration": "300",
            //     "hideDuration": "1000",
            //     "timeOut": "5000",
            //     "extendedTimeOut": "1000",
            //     "showEasing": "swing",
            //     "hideEasing": "linear",
            //     "showMethod": "fadeIn",
            //     "hideMethod": "fadeOut"
            // };

            // toastr.success("تمت الاضافة بنجاح");
            // clearAndHideErrors();

        })
        .catch(function (error) {
            console.log(error.response.data.errors);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(error.response.data.errors);
            // if (error.response.data.errors !== undefined) {
            //     showErrorMessages(error.response.data.errors);
            // } else {

            //     showMessage(error.response.data);
            // }
        });
}




function storepart(url, data) {

    axios.post(url, data)

        .then(function (response) {
            showMessage(response.data);
            clearForm();
            clearAndHideErrors();

        })

        .catch(function (error) {

            if (error.response.data.errors !== undefined) {
                showErrorMessages(error.response.data.errors);
            } else {

                showMessage(error.response.data);
            }
        });

}
function storeRoute(url, data) {
    axios.post(url, data, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
})
        .then(function (response) {
                window.location = response.data.redirect;
             // showMessage(response.data);
            // clearForm();
            // clearAndHideErrors();

        })
        .catch(function (error) {

            if (error.response.data.errors !== undefined) {
                showErrorMessages(error.response.data.errors);
            } else {

                showMessage(error.response.data);
            }
        });
}
function storeRedirect (url, data, redirectUrl) {
    axios.post( url, data)
        .then(function (response) {
            console.log(response);
            if (redirectUrl != null)
                window.location.href = redirectUrl;
        })
        .catch(function (error) {
            console.log(error.response);
        });
}

function update(url, data, redirectUrl) {

    // console.log(data);
    axios.put(url, data)
        .then(function (response) {
            console.log(response.data);

            // if (redirectUrl != null)
            //     window.location.href = redirectUrl;
        })
        .catch(function (error) {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(error.response.data.errors);

            console.log(error.response);
        });
}
function updateRoute (url, data) {
    axios.put( url, data)

        .then(function (response) {
            console.log(response);

        window.location = response.data.redirect;

        })
        .catch(function (error) {
            console.log(error.response);
        });
}
function updateReload (url, data, redirectUrl) {
    axios.put( url, data)
        .then(function (response) {
            console.log(response);
            location.reload()
        })
        .catch(function (error) {
            console.log(error.response);
        });
}
function updatePage(url, data) {
    axios.post(url, data)
        .then(function (response) {
            console.log(response);
            location.reload()
            // showMessage(response.data);
         })
        .catch(function (error) {
            console.log(error.response);
        });
}

function confirmDestroy(url, td) {
    Swal.fire({
        title: 'هل أنت متأكد من عملية الحذف ؟',
        text: "لا يمكن التراجع عن عملية الحذف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.isConfirmed) {
            destroy(url, td);
        }
    });
}


function destroy(url, td) {
    // console.log('destroy');
    axios.delete(url)
        .then(function (response) {
            // handle success
            // console.log(response.data);
            td.closest('tr').remove();
            // td.closest('div').remove();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.warning("تم الحذف بنجاح");
            // showToaster(response.data.message, true);
        })
        .catch(function (error) {
            // handle error
            // console.log(error.response);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(error.response.data.errors);
            // showToaster(error.response.data.message, false);
        })
        .then(function () {
            // always executed
        });
}


function destroyImage(url, ele) {
    // console.log('destroy');
    axios.delete(url)
        .then(function (response) {
            // handle success
            // console.log(response.data);
            // td.closest('tr').remove();
            ele.closest('div').remove();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.warning("تم الحذف بنجاح");
            // showToaster(response.data.message, true);
        })
        .catch(function (error) {
            // handle error
            // console.log(error.response);
            notif({
                msg: error.response.data.errors,
                type: "error"
                });
            // showToaster(error.response.data.message, false);
        })
        .then(function () {
            // always executed
        });
}




function showErrorMessages(errors) {

    document.getElementById('error_alert').hidden = false
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';

    for (var key of Object.keys(errors)) {
        var newLI = document.createElement('li');
        newLI.appendChild(document.createTextNode(errors[key]));
        errorMessagesUl.appendChild(newLI);
    }
}

function clearAndHideErrors() {
    document.getElementById('error_alert').hidden = true
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';
}

function clearForm() {
    document.getElementById("create_form").reset();
}

function showMessage(data) {
    console.log(data);
    Swal.fire({
        position: 'center',
        icon: data.icon,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
    })
}


