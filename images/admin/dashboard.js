function toggleModal(modal) {
    $(modal).modal('toggle');
}

function updateNama() {
    var nama_depan = $('#nama_depan').val();
    var nama_belakang = $('#nama_belakang').val();

    var data = {
        'action': 'updateNama',
        'nama_depan': nama_depan,
        'nama_belakang': nama_belakang
    };

    $.post(window.location, data, function(result) {
        if (result.sukses === true) {
            toggleModal('#nama');
            toggleModal('#namaSukses');
        } else {
            toggleModal('#nama');
            toggleModal('#namaError');
        }
    }, 'json');
}

Dropzone.options.uploadFoto = {
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    uploadMultiple: false,
    maxFiles: 1,
    paramName: 'foto',
    init: function() {
        var myDropZone = this;

        document.getElementById('submit-foto').addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropZone.processQueue();
        });
    },
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
    sending: function(file, xhr, formData) {
        formData.append('action', 'updateFoto');
    },
    success: function(file, response, e) {
        var result = JSON.parse(response);
        if (result.sukses === true) {
            toggleModal('#foto');
            toggleModal('#fotoSukses');
        } else {
            toggleModal('#foto');
            toggleModal('#fotoError');
        }
    }
};

function updateBiografi() {
    var biografi = $('#text-biografi').val();
    var data = {
        'action': 'updateBiografi',
        'biografi': biografi
    };

    $.post(window.location, data, function(result) {
        if (result.sukses === true) {
            toggleModal('#biografi');
            toggleModal('#biografiSukses');
        } else {
            toggleModal('#biografi');
            toggleModal('#biografiError');
        }
    }, 'json');
}

function updateKontak() {
    var alamat = $('#text-alamat').val();
    var telepon = $('#telepon').val();
    var data = {
        'action': 'updateKontak',
        'alamat': alamat,
        'telepon': telepon
    };

    $.post(window.location, data, function(result) {
        if (result.sukses === true) {
            toggleModal('#kontak');
            toggleModal('#kontakSukses');
        } else {
            toggleModal('#kontak');
            toggleModal('#kontakError');
        }
    }, 'json');
}

function updateEmail() {
    var email = $('#text-email').val();
    var password = $('#text-email-password').val();
    var data = {
        'action': 'updateEmail',
        'email': email,
        'password': password
    };

    $.post(window.location, data, function(result) {
        if (result.sukses === true) {
            toggleModal('#email');
            toggleModal('#emailSukses');
        } else {
            toggleModal('#email');
            toggleModal('#emailError');
        }
    }, 'json');
}

function updatePassword() {
    var passwordLama = $('#text-password-lama').val();
    var passwordBaru = $('#text-password-baru').val();
    var data = {
        'action': 'updatePassword',
        'passwordLama': passwordLama,
        'passwordBaru': passwordBaru
    };

    $.post(window.location, data, function(result) {
        if (result.sukses === true) {
            toggleModal('#password');
            toggleModal('#passwordSukses');
        } else {
            toggleModal('#password');
            toggleModal('#passwordError');
        }
    }, 'json');
}

$(function() {
    $('[data-toggle="popover"]').popover({
        html: true
    });
});
