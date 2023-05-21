@extends('layouts.base_admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 breadcrumb-wrapper mb-4">
   <span class="text-muted fw-light">User / View /</span> Account
</h4>
<div class="row gy-4">
   <!-- User Sidebar -->
   <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-4">
         <div class="card-body">
            <div class="user-avatar-section">
               <div class=" d-flex align-items-center flex-column">
                  <img class="img-fluid rounded my-4" src="../../assets/img/avatars/10.png" height="110"
                     width="110" alt="User avatar" />
                  <div class="user-info text-center">
                     <h5 class="mb-2">{{ $data->detail->nama }}</h5>
                     <span class="badge bg-label-secondary">{{ $data->detail->jenis_pemohon }}</span>
                  </div>
               </div>
            </div>
            <div class="d-flex justify-content-around flex-wrap my-4 py-3">
               <div class="d-flex align-items-start me-4 mt-3 gap-3">
                  <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                  <div>
                     <h5 class="mb-0">1.23k</h5>
                     <span>Tasks Done</span>
                  </div>
               </div>
               <div class="d-flex align-items-start mt-3 gap-3">
                  <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-customize bx-sm'></i></span>
                  <div>
                     <h5 class="mb-0">568</h5>
                     <span>Projects Done</span>
                  </div>
               </div>
            </div>
            <h5 class="pb-2 border-bottom mb-4">Details</h5>
            <div class="info-container">
               <ul class="list-unstyled">
                  <li class="mb-3">
                     <span class="fw-bold me-2">Nama Pimpinan:</span>
                     <span>{{ $data->nama_pimpinan }}</span>
                  </li>
                  <li class="mb-3">
                     <span class="fw-bold me-2">Email:</span>
                     <span>{{ $data->email }}</span>
                  </li>
                  <li class="mb-3">
                     <span class="fw-bold me-2">Status:</span>
                     @switch($data->is_active)
                     @case('Aktif')
                     <span class="badge bg-label-success">Active</span>
                     @break
                     @case('Tidak Aktif')
                     <span class="badge bg-label-danger">Tidak Aktif</span>
                     @break
                     @default
                     @endswitch
                  </li>
                  <li class="mb-3">
                     <span class="fw-bold me-2">Role:</span>
                     <span>{{ $data->getRoleNames()->first(); }}</span>
                  </li>
                  <li class="mb-3">
                     <span class="fw-bold me-2">No Hp:</span>
                     <span>{{ $data->detail->no_telp }}</span>
                  </li>
               </ul>
               <div class="d-flex justify-content-center pt-3">
                  <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                     data-bs-toggle="modal">Edit</a>
                  <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
               </div>
            </div>
         </div>
      </div>
      <!-- /User Card -->
      <!-- Plan Card -->
      <!-- /Plan Card -->
   </div>
   <!--/ User Sidebar -->
   <!-- User Content -->
   <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
         <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
            class="bx bx-user me-1"></i>Account</a></li>
         <li class="nav-item"><a class="nav-link" href="app-user-view-security.html"><i
            class="bx bx-lock-alt me-1"></i>Security</a></li>
         <li class="nav-item"><a class="nav-link" href="app-user-view-billing.html"><i
            class="bx bx-detail me-1"></i>Billing & Plans</a></li>
         <li class="nav-item"><a class="nav-link" href="app-user-view-notifications.html"><i
            class="bx bx-bell me-1"></i>Notifications</a></li>
         <li class="nav-item"><a class="nav-link" href="app-user-view-connections.html"><i
            class="bx bx-link-alt me-1"></i>Connections</a></li>
      </ul> --}}
      <!--/ User Pills -->
      <!-- Project table -->
      {{-- <div class="card mb-4">
         <h5 class="card-header">User's Projects List</h5>
         <div class="table-responsive mb-3">
            <table class="table datatable-project border-top">
               <thead>
                  <tr>
                     <th></th>
                     <th>Project</th>
                     <th class="text-nowrap">Total Task</th>
                     <th>Progress</th>
                     <th>Hours</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div> --}}
      <!-- /Project table -->
      <!-- Activity Timeline -->
      <div class="card mb-4">
         <h5 class="card-header">User Activity Timeline</h5>
         <div class="card-body">
            <ul class="timeline">
               <li class="timeline-item timeline-item-transparent">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                     <div class="timeline-header mb-1">
                        <h6 class="mb-0">12 Invoices have been paid</h6>
                        <small class="text-muted">12 min ago</small>
                     </div>
                     <p class="mb-2">Invoices have been paid to the company</p>
                     <div class="d-flex">
                        <a href="javascript:void(0)" class="me-3">
                        <img src="../../assets/img/icons/misc/pdf.png" alt="PDF image" width="20" class="me-2">
                        <span class="fw-bold text-body">invoices.pdf</span>
                        </a>
                     </div>
                  </div>
               </li>
               <li class="timeline-item timeline-item-transparent">
                  <span class="timeline-point timeline-point-warning"></span>
                  <div class="timeline-event">
                     <div class="timeline-header mb-1">
                        <h6 class="mb-0">Client Meeting</h6>
                        <small class="text-muted">45 min ago</small>
                     </div>
                     <p class="mb-2">Project meeting with john @10:15am</p>
                     <div class="d-flex flex-wrap">
                        <div class="avatar me-3">
                           <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                           <h6 class="mb-0">Lester McCarthy (Client)</h6>
                           <span>CEO of PIXINVENT</span>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="timeline-item timeline-item-transparent">
                  <span class="timeline-point timeline-point-info"></span>
                  <div class="timeline-event">
                     <div class="timeline-header mb-1">
                        <h6 class="mb-0">Create a new project for client</h6>
                        <small class="text-muted">2 Day Ago</small>
                     </div>
                     <p class="mb-2">5 team members in a project</p>
                     <div class="d-flex align-items-center avatar-group">
                        <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                           data-bs-placement="top" title="Vinnie Mostowy">
                           <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                           data-bs-placement="top" title="Marrie Patty">
                           <img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                           data-bs-placement="top" title="Jimmy Jackson">
                           <img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                           data-bs-placement="top" title="Kristine Gill">
                           <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                           data-bs-placement="top" title="Nelson Wilson">
                           <img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle">
                        </div>
                     </div>
                  </div>
               </li>
               <li class="timeline-item timeline-item-transparent">
                  <span class="timeline-point timeline-point-success"></span>
                  <div class="timeline-event">
                     <div class="timeline-header mb-1">
                        <h6 class="mb-0">Design Review</h6>
                        <small class="text-muted">5 days Ago</small>
                     </div>
                     <p class="mb-0">Weekly review of freshly prepared design for our new app.</p>
                  </div>
               </li>
               <li class="timeline-end-indicator">
                  <i class="bx bx-check-circle"></i>
               </li>
            </ul>
         </div>
      </div>
      <!-- /Activity Timeline -->
      <!-- Invoice table -->
      {{-- <div class="card">
         <div class="table-responsive mb-3">
            <table class="table datatable-invoice border-top">
               <thead>
                  <tr>
                     <th></th>
                     <th>ID</th>
                     <th><i class='bx bx-trending-up'></i></th>
                     <th>Total</th>
                     <th>Issued Date</th>
                     <th>Actions</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div> --}}
      <!-- /Invoice table -->
   </div>
   <!--/ User Content -->
</div>
<!-- Modal -->
<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
         <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
               <h3>Edit User Information</h3>
               <p>Updating user details will receive a privacy audit.</p>
            </div>
            <form id="editUserForm" class="row g-3" method="POST" action="{{ url('pemohon/profil') }}">
                @csrf
               <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserFirstName">Nama Organisasi / Individu</label>
                  <input type="text" id="modalEditUserFirstName" name="nama" value="{{ $data->detail->nama }}"
                     class="form-control" placeholder="Nama" required />
               </div>
               <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserLastName">Nama Pimpinan</label>
                  <input type="text" id="modalEditUserLastName" name="nama_pimpinan" value="{{ $data->detail->nama_pimpinan }}" class="form-control"
                     placeholder="Doe" required />
               </div>
               <div class="col-12 col-md-6">
                  <label class="form-label" for="modalEditUserLastName">Nomor Identitas</label>
                  <input type="text" id="modalEditUserLastName" name="identitas" value="{{ $data->detail->identitas }}" class="form-control"
                     placeholder="Doe" required />
               </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserEmail">Email</label>
                    <input type="text" id="modalEditUserEmail" name="email" value="{{ $data->email }}" class="form-control"
                    placeholder="example@domain.com" required />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditTaxID">Nomor Telpon</label>
                    <input type="number" id="modalEditTaxID" name="no_telp" value="{{ $data->detail->no_telp }}"
                    class="form-control modal-edit-tax-id" placeholder="628421315122" required />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserPhone">Bank</label>
                    <div class="input-group input-group-merge">
                    {{-- <span class="input-group-text">+1</span> --}}
                    <select name="bank" class="form-control" id="">
                        <option value="" selected disabled> == Bank == </option>
                        <option value="Bank BRI">Bank BRI</option>
                        <option value="Bank Kalbar">Bank Kalbar</option>
                        <option value="Bank BCA">Bank BCA</option>
                        <option value="Bank MANDIRI">Bank MANDIRI</option>
                        <option value="Bank BNI">Bank BNI</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditTaxID">Nomor Rekening</label>
                    <input type="number" id="modalEditTaxID" name="no_rek" value="{{ $data->detail->no_rek }}"
                    class="form-control modal-edit-tax-id" placeholder="628421315122" required />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditTaxID">Nama Pemilik Rekening</label>
                    <input type="text" id="modalEditTaxID" name="nama_pemilik_rek" value="{{ $data->detail->nama_pemilik_rek }}"
                    class="form-control modal-edit-tax-id" placeholder="Nama Pemilik Rekening" required />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditTaxID">Alamat</label>
                    <input type="text" id="modalEditTaxID" name="alamat" value="{{ $data->detail->alamat }}"
                    class="form-control modal-edit-tax-id" placeholder="Alamat" required />
                </div>
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                </div>
            </form>
            </div>
         </div>
      </div>
   </div>
   
</div>

@endsection