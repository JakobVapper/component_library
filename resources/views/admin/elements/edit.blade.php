<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Element') }}
            </h2>
            <a href="{{ route('admin.elements.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                Back to Elements
            </a>
        </div>
    </x-slot>

    @if(View::exists('components.admin-nav'))
        <x-admin-nav />
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 p-4 rounded-md text-green-700">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Element Details</h3>
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-500">Created by: {{ $element->user->name }}</p>
                            
                            <div>
                                @if($element->status === 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @elseif($element->status === 'approved')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Rejected
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.elements.update', $element) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="post_id" class="block text-sm font-medium text-gray-700">Select Post</label>
                            <select name="post_id" id="post_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Select a post...</option>
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}" {{ (old('post_id', $element->post_id) == $post->id) ? 'selected' : '' }}>
                                        {{ $post->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('post_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Element Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('name', $element->name) }}" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content', $element->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="code" class="block text-sm font-medium text-gray-700">HTML/Tailwind Code</label>
                            <textarea name="code" id="code" rows="8" class="font-mono mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('code', $element->code) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">HTML and Tailwind CSS component code</p>
                            @error('code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="pending" {{ (old('status', $element->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ (old('status', $element->status) == 'approved') ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ (old('status', $element->status) == 'rejected') ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Changing the status here will override the normal approval workflow.</p>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('admin.elements.review', $element) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                Preview
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update Element
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>