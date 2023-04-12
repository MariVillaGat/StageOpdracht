@props(['product'])
<tr>
    <td class="border px-4 py-2">{{ $product->id }}</td>
    <td class="border px-4 py-2">{{ $product->title }}</td>
    <td class="border px-4 py-2">{{ $product->description }}</td>
    <td class="border px-4 py-2">{{ $product->price }}</td>
    <td class="border px-4 py-2">
        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
    </td>
    <td class="border px-4 py-2">
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </td>
</tr>

