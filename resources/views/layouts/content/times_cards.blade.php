<div class="container-fluid mt--7">
    <div class="row">
        @foreach ($times as $time)
            <div class="col-md-3 mt-2">
                <a href="{{ route('time.jogadores', $time->id) }}">
                    <div class="card card-barezao btn btn-secondary mb-2">
                        <div class="card-body p-1">
                            <div class="d-flex justify-content-around align-items-center">
                                    <img src="{{ asset('storage') . '/' . $time->logo }}" class="text-center" style="max-width: 60%; max-height: 80px" alt="">
                                <div>
                                    <img src="{{ asset('storage') . '/' . $time->escudo }}" class="text-center" style="width:80px; max-height: 80px" alt="">
                                    <h2 class="text-center">{{$time->time}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('time.jogadores', $time->id) }}">
                    <div class="card card-barezao btn btn-secondary d-flex justify-content-around align-items-center p-0">
                        <h3>{{$time->empresa}}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>