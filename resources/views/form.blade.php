<x-app-layout>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Form Field</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
              </div>

              <div class="text-center">
                <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>