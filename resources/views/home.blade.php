@extends('layouts.appDashboard')
@section('title','Inicio')
@section('nameTitleTemplate','Inicio')
@section('js')

@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12 grid-margin">
		<div class="card bg-default shadow">
			<div class="card-body table-responsive">
				<canvas id='chart'></canvas>
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Club</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Club.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Parrilla</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Template.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Divición</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Division.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Encuentros</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Encounter.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Publicaciones</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Post.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 pb-1">
							<div class="card card-stats">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<span class="h5 font-weight-bold">Perfiles de Usuarios</span>
										</div>
										<div class="col-auto">
											<a href="{{ route('Users.index') }}" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
												<div class="btn-icons btn-rounded btn bg-danger text-white shadow">
													<i class="fa fa-plus text-white"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection