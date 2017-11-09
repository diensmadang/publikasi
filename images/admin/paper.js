function toggleModal(modal) {
    $(modal).modal('toggle');
}

Dropzone.options.uploadPaper = {
    acceptedFiles: '.pdf',
    autoProcessQueue: false,
    uploadMultiple: false,
    maxFiles: 1,
    paramName: 'file',
    init: function() {
        var myDropZone = this;

        document.getElementById('submit-paper').addEventListener("click", function(e) {
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
        var judul = $('#judul').val();
        var deskripsi = $('#deskripsi').val();
        var pengarang = $('#pengarang').val();
        var tahun = $('#tahun').val();
        var pembimbing = $('#pembimbing').val();
        var jurusan = $('#jurusan').val();

        formData.append('action', 'addService');
        formData.append('judul', judul);
        formData.append('deskripsi', deskripsi);
        formData.append('pengarang', pengarang);
        formData.append('tahun', tahun);
        formData.append('pembimbing', pembimbing);
        formData.append('jurusan', jurusan);
    },
    success: function(file, response) {
        if (response.sukses) {
            $("#paperSuccess").modal("show");
        }
    },
    error: function(file, response, xhr) {
        if (file.accepted === false) {
            this.removeAllFiles();
            bootbox.alert("Harap pilih file pdf.");
        }
        if (xhr) {
            if (response.error.judul) {
                $("#paperError").modal("show");
                this.removeAllFiles();
            }
        }
    }
};

Dropzone.options.updateFile = {
    acceptedFiles: '.pdf',
    autoProcessQueue: false,
    uploadMultiple: false,
    maxFiles: 1,
    paramName: 'file',
    init: function() {
        var myDropZone = this;

        document.getElementById('submit-update-file').addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropZone.processQueue();
        });

        $('#updateError').on('hidden.bs.modal', function(e) {
            toggleModal('#file');
        });

        $('#close-update-file').on('click', function(e) {
            myDropZone.removeAllFiles();
        });
    },
    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
    sending: function(file, xhr, formData) {
        var id = $('#file-id').val();

        formData.append('action', 'updateFile');
        formData.append('id', id);
    },
    success: function(file, response) {
        if (response.sukses) {
            toggleModal('#file');
            $('#updateSuccess .modal-body').html("Paper berhasil diupdate.");
            $("#updateSuccess").modal("show");
        }
    },
    error: function(file, response, xhr) {
        if (file.accepted === false) {
            toggleModal('#file');
            this.removeAllFiles();
            bootbox.alert("Harap pilih file pdf.", function() {
                toggleModal('#file');
            });
        }

        if (xhr) {
            toggleModal('#file');
            $('#updateError .modal-body').html("Terjadi kesalahan.");
            $("#updateError").modal("show");
            this.removeAllFiles();
        }
    }
};

function setFileId(id) {
    $('#file-id').val(id);
}

function updateJudul(id) {
    var judul = $('#judul' + id + 'value').val();
    var data = {
        'action': 'updateJudul',
        'id': id,
        'judul': judul
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#judul' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#judul' + id);
                $('#updateSuccess .modal-body').html("Judul berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            var result = JSON.parse(xhr.responseText);
            toggleModal('#judul' + id);
            if (result.error.judul) {
                $('#updateError .modal-body').html("Judul tidak boleh kosong.");
            } else {
                $('#updateError .modal-body').html("Terjadi kesalahan.");
            }
            toggleModal('#updateError');
        });
}

function updateDeskripsi(id) {
    var deskripsi = $('#deskripsi' + id + 'value').val();
    var data = {
        'action': 'updateDeskripsi',
        'id': id,
        'deskripsi': deskripsi
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#deskripsi' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#deskripsi' + id);
                $('#updateSuccess .modal-body').html("Deskripsi berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            toggleModal('#deskripsi' + id);
            $('#updateError .modal-body').html("Terjadi kesalahan.");
            toggleModal('#updateError');
        });
}

function updatePengarang(id) {
    var pengarang = $('#pengarang' + id + 'value').val();
    var data = {
        'action': 'updatePengarang',
        'id': id,
        'pengarang': pengarang
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#pengarang' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#pengarang' + id);
                $('#updateSuccess .modal-body').html("Pengarang berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            toggleModal('#pengarang' + id);
            $('#updateError .modal-body').html("Terjadi kesalahan.");
            toggleModal('#updateError');
        });
}

function updateTahun(id) {
    var tahun = $('#tahun' + id + 'value').val();
    var data = {
        'action': 'updateTahun',
        'id': id,
        'tahun': tahun
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#tahun' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#tahun' + id);
                $('#updateSuccess .modal-body').html("Tahun berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            var result = JSON.parse(xhr);
            if (result.error.tahun) {
                toggleModal('#tahun' + id);
                $('#updateError .modal-body').html("Tahun tidak valid.");
            } else {
                toggleModal('#tahun' + id);
                $('#updateError .modal-body').html("Terjadi kesalahan.");
            }
            toggleModal('#updateError');
        });
}

function updatePembimbing(id) {
    var pembimbing = $('#pembimbing' + id + 'value').val();
    var data = {
        'action': 'updatePembimbing',
        'id': id,
        'pembimbing': pembimbing
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#pembimbing' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#pembimbing' + id);
                $('#updateSuccess .modal-body').html("Pembimbing berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            toggleModal('#pembimbing' + id);
            $('#updateError .modal-body').html("Terjadi kesalahan.");
            toggleModal('#updateError');
        });
}

function updateJurusan(id) {
    var jurusan = $('#jurusan' + id + 'value').val();
    var data = {
        'action': 'updateJurusan',
        'id': id,
        'jurusan': jurusan
    };

    $('#updateError').on('hidden.bs.modal', function(e) {
        toggleModal('#jurusan' + id);
    });
    $.post(window.location, data, function(result) {
            if (result.sukses === true) {
                toggleModal('#jurusan' + id);
                $('#updateSuccess .modal-body').html("Jurusan berhasil diupdate.");
                toggleModal('#updateSuccess');
            }
        }, 'json')
        .fail(function(xhr) {
            toggleModal('#jurusan' + id);
            $('#updateError .modal-body').html("Terjadi kesalahan.");
            toggleModal('#updateError');
        });
}

function deletePaper(id) {
    var judul = $('#judul' + id + 'value').val();
    var data = {
        'action': 'deletePaper',
        'id': id
    };

    bootbox.dialog({
        message: "Yakin ingin menghapus " + judul + "?",
        title: "Konfirmasi",
        buttons: {
            batal: {
                label: "Batal",
                className: "btn-default",
            },
            ya: {
                label: "Ya",
                className: "btn-danger",
                callback: function() {
                    $.post(window.location, data, function(result) {
                            if (result.sukses === true) {
                                $('#deleteSuccess .modal-body').html(judul + " berhasil dihapus.");
                                toggleModal('#deleteSuccess');
                            }
                        }, 'json')
                        .fail(function(xhr) {
                            $('#deleteError .modal-body').html("Terjadi kesalahan.");
                            toggleModal('#deleteError');
                        });
                }
            }
        }
    });
}

$(function() {
    $('[data-toggle="popover"]').popover({
        html: true
    });
});
