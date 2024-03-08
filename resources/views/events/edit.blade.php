<x-guest-layout title="Edit my event">

    <div class="col-md-9">
        <h1 class="text-center mb-3">Ajouter un Wiki</h1>
        <form action="{{ route('events.update', $event) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}"
                    required>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="form-group my-4">
                <label for="description">description:</label>
                <textarea class="form-control" id="description" name="description" rows="15">{{ $event->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>

            <div class="form-group my-4">
                <label for="start_date">Start Date:</label>
                <input class="form-control" type="datetime-local" id="start_date" name="start_date"
                    value="{{ $event->start_date }}" required>
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

            </div>

            <div class="form-group my-4">
                <label for="end_date">Start Date:</label>
                <input class="form-control" type="datetime-local" id="end_date" name="end_date"
                    value="{{ $event->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}"
                    required>
            </div>



            <div class="form-group my-4">
                <label for="categorie">Categorie:</label>
                <select class="form-select" name="category_id" id="categorie" required>
                    <option selected disabled>Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        @if ($event->category_id === $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="hidden" name="organizer_id" value="{{ $user->id }}">
            </div>

            <div class="form-group my-4">
                <label for="total_seats">Available Seats:</label>
                <input type="number" class="form-control" id="total_seats"
                    name="total_seats"value="{{ $event->total_seats }}" required>
            </div>

            <div class="form-group my-4">
                {{-- <label for="auto_acceptance">Auto Acceptance:</label> --}}
                {{-- <input type="radio" class="form-check-input" id="auto_acceptance" name="auto_acceptance" > --}}
                <label>
                    <input type="radio" @checked($event->auto_acceptance === 1) name="auto_acceptance"
                        value="1">
                    Auto Acceptance
                </label>
                <label>
                    <input type="radio" name="auto_acceptance" @checked($event->auto_acceptance === 0) value="0">
                    Manual validation
                </label>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>

    </div>

    </form>

    </div>
    </div>




</x-guest-layout>
