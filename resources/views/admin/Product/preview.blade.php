@extends('template.layoutadmin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class=" mb-2">
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset("img/phone/".$product->file) }}" class="card-img-top" alt="...">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <h3 class="m-0 ">{{$product->name ." ". $product->color}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <h3>Rp. {{number_format($product->harga, 0, ',', '.')}}</h3>
                    </div>
                </div>
                <hr>
                <h2>Specifications</h2>
                <hr>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        Announced
                    </div>
                    <div class="col-sm-8">
                        {{$product->detail->announced}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        OS
                    </div>
                    <div class="col-sm-8">
                        {{$product->detail->OS}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Display
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->display !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Chipset
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->chipset !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Camera
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->camera !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Sensors
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->sensors !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Battery
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->battery !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <h3><span><i class="fas fa-question-circle"></i></span> Discussion</h3>
                <hr>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12 mb-3">
                @if (count($questions)==0)
                <p class="text-muted text-center">Nothing to show</p>
                @else
                <div id="diskusi">
                    @foreach ($questions as $question)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="d-flex justify-content-center" id="users-profile">
                                        <span style="font-size: 24px"><i class="fa fa-user-circle"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-11">
                                    <h5 class="card-title mb-0">{{ $question->user->name }}</h5>
                                    <p class="text-muted mb-0 float-right">
                                        {{ $question->created_at->diffForHumans() }}</p>
                                    <br>
                                    <p style="font-size: 16px">{{ $question->body }}</p>
                                    <a href="#" id="btn-answer" data-toggle="modal"
                                        data-target="#exampleModal{{ $question->id }}{{ $product->id }}">Balas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($answers as $answer)
                    @if ($answer->question_id==$question->id)
                    <div class="card" id="answers-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="d-flex justify-content-center" id="users-profile">
                                        <span style="font-size: 24px"><i class="fa fa-user-circle"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-11">
                                    <h5 class="card-title mb-0"><strong>Admin</strong><span> membalas</span></h5>
                                    <p class="text-muted mb-0 float-right">
                                        {{ $question->answers->created_at->diffForHumans() }}
                                    </p>
                                    <br>
                                    <p style="font-size: 16px">{{ $question->answers->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="modal fade" id="exampleModal{{ $question->id }}{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="/answer/create/" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Answer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>{{ $question->body }}</strong></p>
                                        <hr>
                                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Your Answer"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                name="answer">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
</section>
@endsection