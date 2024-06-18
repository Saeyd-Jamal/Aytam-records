@extends('layouts.master4')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a type="button" class="btn btn-danger btn-icon ml-2" href="{{route('users.create')}}"><i class="mdi mdi-plus"></i></a>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">المستخدمين</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive" id="employee_table">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">الاسم</th>
                                            <th class="border-bottom-0">اسم المستخدم</th>
                                            <th class="border-bottom-0">رقم الهاتف</th>
                                            <th class="border-bottom-0">نوع المستخدم</th>
                                        </thead>
										<tbody id="table_orphan">
                                            @foreach ( $users as $user )
                                                @if ($user['type_user'] != "متحكم رئيسي")
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <a class="nav-link" href="{{route('users.show',$user['id'])}}">{{$user['name']}}</a>
                                                    </td>
                                                    <td>{{$user['username']}}</td>
                                                    <td>{{$user['phone_number']}}</td>
                                                    <td>{{$user['type_user']}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
