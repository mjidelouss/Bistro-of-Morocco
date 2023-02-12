<section class="space-y-6" style="height: 8rem;">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Add Admin
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Choose a user to make admin from the list below :
        </p>
    </header>

    <div class="mb-3">
        <form action="{{route('profile.store')}}" method="POST">
        @csrf
		@method('PUT')
        <div class="input-group d-flex">
            <div class="form-outline">
                <select class="form-control" id="admin" name="admin" style="width: 12rem;">
                    <option value="0">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ ++$i }}">{{ $user->name }}</option>
                    @endforeach
                    </select>
            </div>
            <button type="submit" name="apply" class="btn btn-primary opacity-50 rounded ms-2">
                <i class="fas fa-search text-black"></i>
            </button>
          </form>
        </div>
        </div>
</section>
