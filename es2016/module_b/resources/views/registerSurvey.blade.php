@extends('layouts.page')
@section('content')
    <div class="ui grid container" id="newsurvey">
        <div class="sixteen wide column">
            @if($errors->any())
            <div class="ui error message">
                @foreach($errors->all() as $e)
                    {{$e}}<br/>
                @endforeach
            </div>
            @endif
            <form class="ui form" method="post" action="{{route('newSurvey')}}" enctype="multipart/form-data">
                @csrf
                <h4 class="ui dividing header">About Survey</h4>
                <div class="three fields">
                    <div class="field">
                        <label for="identification">Identification</label>
                        <input type="text" placeholder="Identification" id="identification" name="identification" value="{{old('identification')}}">
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" id="password" name="password" value="{{old('password')}}">
                    </div>
                    <div class="field">
                        <label for="title">Survey Title</label>
                        <input type="text" placeholder="Survey Title" id="title" name="title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="field">
                    <label for="description">Survey Description</label>
                    <textarea placeholder="Survey Description" rows="2" id="description" name="description">{{old('description')}}</textarea>
                </div>
                <div class="field">
                    <label for="type">Type of Survey</label>
                    <select id="type" name="type">
                        <option value="" disabled{{ empty(old('type')) ? ' selected' : '' }}>Select</option>
                        <option value="public"{{ old('type') === 'public' ? ' selected' : '' }}>Public Survey</option>
                        <option value="restricted"{{ old('type') === 'restricted' ? ' selected' : '' }}>Restrict Survey</option>
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
                                    <div class="item" data-id="{{$emp->id}}" data-name="{{$emp->name}}" data-company="{{$emp->partners->last()->companyName ?? ''}}">
                                        <div class="content">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="employees[]" value="{{$emp->id}}" {{ in_array((string)$emp->id, old('employees') ?? []) ? 'checked' : '' }}>
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
                    <label for="file">Attached File</label>
                    <input type="file" id="file" name="file" @change="filePreview($event)" />
                    <div id="preview" v-if="previewUrl" :style="{backgroundImage: `url(${previewUrl})`}">
                        <p>Image preview</p>
                    </div>
                </div>
                <h4 class="ui dividing header">Period of Survey</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="start_date">Start Date</label>
                        <input type="date" placeholder="Start Date" id="start_date" name="start_date" value="{{old('start_date')}}">
                    </div>
                    <div class="field">
                        <label for="end_date">End Date</label>
                        <input type="date" placeholder="End Date" id="end_date" name="end_date" value="{{old('end_date')}}">
                    </div>
                </div>
                <h4 class="ui dividing header">Questions <span><button class="ui button new-question" @click.prevent="addQuestion"><i class="add square icon"></i> New question</button></span></h4>
                <div class="three fields" v-for="q of questionData" :key="q.id">
                    <input type="hidden" :name="`question[${q.id}][id]`" :value="q.id">
                    <div class="field">
                        <label>Question</label>
                        <input type="text" placeholder="Question" :name="`question[${q.id}][question]`" v-model="q.question">
                    </div>
                    <div class="field">
                        <label>Type of Answer</label>
                        <select :name="`question[${q.id}][type]`" v-model="q.type">
                            <option value="" disabled>Select</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="option">Option</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Options List</label>
                        <input type="text" placeholder="Options List" :name="`question[${q.id}][options]`" v-model="q.options">
                    </div>
                    <div class="field">
                        <button class="ui red button remove-question" @click.prevent="removeQuestion(q.id)"><i class="remove icon"></i> Remove</button>
                    </div>
                </div>

                <a href="{{route('index')}}" class="ui button">Back</a>
                <button class="ui button primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        <?php $question = array_values(old('question') ?? ["1" => ['id' => 1, 'question' => '', 'type' => '', 'options' => '']]) ?>
        const survey = new Vue({
            el: '#newsurvey',
            data: {
                initialQuestionData: @json($question),
                questionData: null,
                previewUrl: null,
            },
            created() {
                const arr = [];

                for (let q of this.initialQuestionData) {
                    arr.push({
                        id: arr.length+1,
                        question: String(q.question ?? ''),
                        type: String(q.type ?? ''),
                        options: String(q.options ?? ''),
                    });
                }

                this.questionData = arr;
            },
            methods: {
                addQuestion() {
                    this.questionData.push({
                        id: this.questionData[this.questionData.length-1].id + 1,
                        question: '',
                        type: '',
                        options: '',
                    })
                },
                removeQuestion(id) {
                    const i = this.questionData.findIndex(x => x.id === id);

                    if (i !== -1) {
                        this.questionData.splice(i, 1);
                    }
                },
                filePreview(ev) {
                    const f = ev.target.files[0];

                    if (f.type === 'image/jpeg' || f.type === 'image/png') {
                        if (this.previewUrl) URL.revokeObjectURL(this.previewUrl);

                        this.previewUrl = URL.createObjectURL(f);
                    }
                }
            }
        })
    </script>
@endsection
