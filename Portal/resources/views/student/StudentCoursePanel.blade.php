@extends('layouts.app')



@section('content')
<div class="container">
  <div col-md-10>
      <div class="card">
          <div class="card-header text-white" style="background: #130f40;"><h4><span class="fa fa-graduation-cap mr-2"></span>Course Detail</h4></div>
          <div class="card-title text-center mt-3 mb-0">
                  @if ($course)
                    <h4><strong>Enrolled Course :  </strong> {{ $course->name}}</h4>
                    
                  @endif
          </div>
          <hr/>
          <div class="card-body mt-0">
            <div class="table-responsive">
              <table class="table ">
                <caption style="caption-side: top;" >
                  <h4 >Subject List :-</h4>
                  
                </caption>
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Sr.</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Sem/Year</th>
                    <th scopr="col">Syllabus</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @if ($subjects)
                        @php ($i=1)
                    @foreach ($subjects as $sub)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{ $course->name}}</td>
                          <td>Null</td>
                          <td><button class="btn btn-primary"><span class="fa fa-download mr-2"></span>Download</button></td>
                        </tr>
                        @php ($i++)
                    @endforeach
                  @endif
                    
                  
                  
                </tbody>
              </table>
            </div>

          </div>
      </div>

  </div>



</div>
@endsection