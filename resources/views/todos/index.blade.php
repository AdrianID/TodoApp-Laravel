@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">My Tasks</h2>
        <a href="{{ route('todos.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg inline-flex items-center transition-colors duration-150">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Add New Task
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm divide-y divide-gray-100">
        @forelse($todos as $todo)
            <div class="p-6 hover:bg-gray-50 transition-colors duration-150 {{ $todo->completed ? 'bg-gray-50' : '' }}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                class="w-6 h-6 rounded-full border-2 flex items-center justify-center
                                {{ $todo->completed 
                                    ? 'bg-indigo-600 border-indigo-600 hover:bg-indigo-700 hover:border-indigo-700' 
                                    : 'border-gray-300 hover:border-indigo-500' }} 
                                transition-colors duration-150">
                                @if($todo->completed)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @endif
                            </button>
                        </form>
                        <div>
                            <h3 class="text-lg font-medium {{ $todo->completed ? 'text-gray-500 line-through' : 'text-gray-900' }}">
                                {{ $todo->title }}
                            </h3>
                            @if($todo->description)
                                <p class="mt-1 text-sm text-gray-500 {{ $todo->completed ? 'line-through' : '' }}">
                                    {{ $todo->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('todos.edit', $todo->id) }}" 
                            class="text-gray-400 hover:text-indigo-600 transition-colors duration-150">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="text-gray-400 hover:text-red-600 transition-colors duration-150"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No tasks yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new task</p>
                <div class="mt-6">
                    <a href="{{ route('todos.create') }}" 
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        New Task
                    </a>
                </div>
            </div>
        @endforelse
    </div>
@endsection 