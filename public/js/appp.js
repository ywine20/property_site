
//Delete Confirm button
function deleteConfirm(id){
    Swal.fire({
        title: `Are you sure?` ,
        text: "You won't be able to revert this!",
        color:'yellow',
        icon: 'warning',
        backdrop: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        background:'#423e3d',
        showCancelButton: true,
        confirmButtonColor: '#F5CC7A',
        cancelButtonColor: '#f36565',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                background:'#423e3d',
                position: 'top',
                icon: 'success',
                title: 'Deleted Successfully',
            })
        }else{

        }

    })
}

//Multiple Delete SweetAlert Box
function multipleDeleteConfirm(id){
    Swal.fire({
        title: `Are you sure?` ,
        text: "You won't be able to revert this!",
        color:'yellow',
        icon: 'warning',
        backdrop: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        background:'#423e3d',
        showCancelButton: true,
        confirmButtonColor: '#F5CC7A',
        cancelButtonColor: '#f36565',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                background:'#423e3d',
                position: 'top',
                icon: 'success',
                title: 'Deleted Successfully',
            })
        }else{

        }

    })
}

//Log Out Confirm button
function logout(){
    Swal.fire({
        title: `Are you sure?` ,
        text: "You will be Login Again",
        icon: 'warning',
        backdrop: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        background:'#423e3d',
        showCancelButton: true,
        confirmButtonColor: '#F5CC7A',
        cancelButtonColor: '#f36565',
        confirmButtonText: 'Yes, Log Out!'
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                background:'#423e3d',
                position: 'top',
                icon: 'success',
                title: 'Log Out Successfully',
            })
        }else{

        }

    })
}




