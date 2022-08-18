<script>
    //noty override default theme
    Noty.overrideDefaults({
        theme    : 'nest',
    });

    @if(session('success-login'))
    new Noty({
        text: "Selamat datang <b>{{ session('success-login') }}</b>",
        timeout: 2000,
        progressBar: true,
    }).show();
    @endif

    @if(session('success'))
    new Noty({
        text: "<strong>{{ session('success') }}</strong>",
        timeout: 2000,
        progressBar: true,
        type: 'success'
    }).show();
    @endif

    @if(session('edit'))
    new Noty({
        text: "<strong>{{ session('edit') }}</strong>",
        timeout: 2000,
        progressBar: true,
        type: 'success'
    }).show();
    @endif

    @if(session('delete'))
    new Noty({
        text: "<strong>{{ session('delete') }}</strong>",
        timeout: 2000,
        progressBar: true,
        type: 'success'
    }).show();
    @endif

    @if(session('warning'))
    new Noty({
        text: "<strong>{{ session('warning') }}</strong>",
        timeout: 2000,
        progressBar: true,
        type: 'warning'
    }).show();
    @endif


    @if(session('danger'))
    new Noty({
        text: "<strong>{{ session('danger') }}</strong>",
        type: 'error',
        timeout: 2000,
        progressBar: true,
    }).show();
    @endif

</script>