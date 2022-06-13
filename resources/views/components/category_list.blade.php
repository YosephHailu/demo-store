<div class="list-group bg-white shadow list-group-light" id="listGroupContainer">
    <a href="#"
        class="list-group-item text-center list-group-item-action px-3 border-0 rounded-3 mb-2 text-uppercase bg-light">
        <b>Product Categories</b>
    </a>

    @foreach ($categories as $category)
    <a href="{{ route('store.category.listing', [$category->store->id, $category->id]) }}"
        class="list-group-item list-group-item-action px-3 border-b rounded-3 ">
        <span class="">{{ $category->name }}</span></a>
    @endforeach
</div>

<style>
    #listGroupContainer {
        max-height: 90vh;
        overflow-y: scroll
    }
</style>