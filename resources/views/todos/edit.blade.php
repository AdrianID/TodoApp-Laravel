@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <a href="{{ route('todos.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Tasks
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Task</h2>

        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="title">
                        Task Title
                    </label>
                    <input 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                        {{ $errors->has('title') ? 'border-red-300' : 'border-gray-300' }}"
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title', $todo->title) }}"
                        placeholder="Enter task title"
                        required
                    >
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="description">
                        Description <span class="text-gray-500">(optional)</span>
                    </label>
                    <textarea
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Add task details here..."
                    >{{ old('description', $todo->description) }}</textarea>
                </div>

                <div>
                    <label class="inline-flex items-center">
                        <input 
                            type="checkbox" 
                            name="completed" 
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            {{ $todo->completed ? 'checked' : '' }}
                        >
                        <span class="ml-2 text-sm text-gray-700">Mark as completed</span>
                    </label>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <a href="{{ route('todos.index') }}" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection 