@extends('page')
@section('pageContent')
    <div class="ui grid container">
        <div class="sixteen wide column">
                @if ($errors->any())
                <div class="ui ignored negative message">
                @foreach($errors->all() as $err)
                    <p>{{ $err }}</p>
                @endforeach
                </div>
                @endif
            <form class="ui form" method="POST" action="{{route('newSurvey')}}" enctype="multipart/form-data">
                @csrf
                <h4 class="ui dividing header">About Survey</h4>
                <div class="three fields">
                    <div class="field">
                        <label>Identification</label>
                        <input type="text" placeholder="Identification" name="identification" value="{{old('identification')}}" class="@error('identification') has-error @enderror">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" value="{{old('password')}}" class="@error('password') has-error @enderror">
                    </div>
                    <div class="field">
                        <label>Survey Title</label>
                        <input type="text" placeholder="Survey Title" name="survey_title" value="{{old('survey_title')}}" class="@error('survey_title') has-error @enderror">
                    </div>
                </div>
                <div class="field">
                    <label>Survey Description</label>
                    <textarea placeholder="Survey Description" rows="2" name="survey_description">{{old('survey_description')}}</textarea>
                </div>
                <div class="field">
                    <label>Type of Survey</label>
                    <select name="survey_type" value="{{old('survey_type')}}" class="@error('survey_type') has-error @enderror">
                        <option {{old('survey_type') === '' ? 'selected' : ''}} disabled>Select</option>
                        <option {{old('survey_type') === 'public' ? 'selected' : ''}} value="public">Public Survey</option>
                        <option {{old('survey_type') === 'restrict' ? 'selected' : ''}} value="restrict">Restrict Survey</option>
                    </select>
                </div>

                <div class="ui cards">
                    <div class="card card-employees">
                        <div class="content">
                            <div class="header">Employees Access</div>
                            <div class="two fields">
                                <div class="field">
                                    <label>Filter by Name</label>
                                    <input type="text" placeholder="Filter by Name">
                                </div>

                                <div class="field">
                                    <label>Filter by Company</label>
                                    <input type="text" placeholder="Filter by Company">
                                </div>
                            </div>

                            <div class="description">
                                <h4 class="ui dividing header">Employees</h4>
                                <div class="ui very relaxed horizontal list">
                                    @foreach($employees as $emp)
                                    <div class="item" data-name="{{$emp->name}}" data-company="{{$emp->contract->partner->companyName ?? null}}">
                                        <div class="content">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="access[]" value="{{$emp->id}}" @if(old('access')) {{ in_array($emp->id, old('access')) ? 'checked' : '' }} @endif >
                                                <label>{{$emp->name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Attached File</label>
                    <input type="file" name="file" accept="image/jpeg,image/png" class="@error('file') has-error @enderror">
                </div>
                <h4 class="ui dividing header">Period of Survey</h4>
                <div class="two fields">
                    <div class="field">
                        <label>Start Date</label>
                        <input type="date" placeholder="Start Date" name="start_date" value="{{old('start_date')}}" class="@error('start_date') has-error @enderror">
                    </div>
                    <div class="field">
                        <label>End Date</label>
                        <input type="date" placeholder="End Date" name="end_date" value="{{old('end_date')}}" class="@error('end_date') has-error @enderror">
                    </div>
                </div>
                <h4 class="ui dividing header">Questions <span><button class="ui button new-question" onclick="addQuestion(event)"><i class="add square icon"></i> New question</button></span></h4>
                <div class="three fields" id="baseQuestion">
                    <div class="field">
                        <label>Question</label>
                        <input type="text" placeholder="Question" name="question[]">
                    </div>
                    <div class="field">
                        <label>Type of Answer</label>
                        <select name="answer_type[]">
                            <option value="">Select</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="option">Option</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Options List</label>
                        <input type="text" placeholder="Options List" name="options_list[]">
                    </div>
                    <div class="field">
                        <button class="ui red button remove-question" onclick="removeQuestion(event)"><i class="remove icon"></i> Remove</button>
                    </div>
                </div>
                <div id="questionContainer">
                    @if(old('question'))
                    @for($i = 1; $i < count(old('question')); $i++)
                        <div class="three fields">
                            <div class="field">
                                <label>Question</label>
                                <input type="text" placeholder="Question" name="question[]" value="{{old('question')[$i]}}">
                            </div>
                            <div class="field">
                                <label>Type of Answer</label>
                                <select name="answer_type[]">
                                    <option {{old('answer_type')[$i] === '' ? 'selected' : ''}} value="">Select</option>
                                    <option {{old('answer_type')[$i] === 'text' ? 'selected' : ''}} value="text">Text</option>
                                    <option {{old('answer_type')[$i] === 'number' ? 'selected' : ''}} value="number">Number</option>
                                    <option {{old('answer_type')[$i] === 'option' ? 'selected' : ''}} value="option">Option</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Options List</label>
                                <input type="text" placeholder="Options List" name="options_list[]" value="{{old('options_list')[$i]}}">
                            </div>
                            <div class="field">
                                <button class="ui red button remove-question" onclick="removeQuestion(event)"><i class="remove icon"></i> Remove</button>
                            </div>
                        </div>
                    @endfor
                    @endif
                </div>

                <a href="{{route('index')}}" class="ui button">Back</a>
                <button class="ui button primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        function removeQuestion(ev) {
            ev.preventDefault();
            ev.target.closest('.three.fields').remove();
        }
        function addQuestion(ev) {
            if (ev) ev.preventDefault();
            const el = document.getElementById('baseQuestion').cloneNode(true)
            el.id = '';

            document.getElementById('questionContainer').appendChild(el);
        }
        @if(!old('answer_type'))
            addQuestion();
        @endif
    </script>
@endsection
