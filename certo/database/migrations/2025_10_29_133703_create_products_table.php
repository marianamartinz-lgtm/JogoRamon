 // App/Http/Controllers/ProductController.php

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ... (métodos index, create, store)

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        // O Laravel (com injeção de dependência) já busca o produto
        // baseado no ID passado na rota.
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validação dos dados (MUITO IMPORTANTE!)
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        // 2. Atualiza o registro no banco
        $product->update($validatedData);

        // 3. Redirecionamento após salvar
        return redirect()->route('products.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    // ... (restante do Controller)
}