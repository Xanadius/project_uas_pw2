<!-- Modal Background -->
<div id="modal-bg" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden" onclick="openModal(false)"></div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Order Confirmation</h2>
        <form action="place_order" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Receiver Name
                </label>
                <input id="name" name="name" type="text" value="{{ Auth::user()->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                    Receiver Address
                </label>
                <textarea id="address" name="address" type="address"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    {{ Auth::user()->address }}
                  </textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Receiver Phone Number
                </label>
                <input id="phone" name="phone" type="number" value="{{ Auth::user()->phone }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Place Order
                </button>
                <button type="button" onclick="openModal(false)" class="text-red-500 hover:text-red-700">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
