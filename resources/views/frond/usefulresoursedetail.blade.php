@extends('admin.site')
@section('content')
<main>
    <section>
        <div class="useful-links">
            <div class="container">
                <div class="pageView">
                    <div class="projectView">
                        

                        <img src="{{ asset('admin/images/' . $resource->image) }}" alt="{{ $resource['title_'. \App::getLocale()] }}">

                        <div class="description">
                            <h1 class="simpleTitle">{{ $resource['title_'. \App::getLocale()] }}</h1>

                            <p>{{ $resource['body_'. \App::getLocale()] }}</p>

                            <table id="w0" class="table detail-view projectTable">
                                <tbody>
                                    <tr>
                                        <th>Veb-sayt</th>
                                        <td><a href="https://attestat.uzedu.uz/" target="_blank">https://attestat.uzedu.uz/</a></td>
                                    </tr>
                                    <tr>
                                        <th>Qo'shimcha ma'lumot</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Saytga havola</th>
                                        <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgCAIAAAAErfB6AAAACXBIWXMAAA7EAAAOxAGVKw4bAAADEUlEQVR4nO3dvUoEQRAAYU80Ft//IcXYxMBsR5il6Z+5or7MwPPYYqAddmcf318/L+J6nf4CqmVgOAPDGRju7fLzx+f7yPf4E5v41u982ud0unxnVzCcgeEMDGdgOAPDXafoVd1e5p1ps24ivTMzZ83Vg9fQFQxnYDgDwxkYzsBw+yl6FZtssyZJxh0KbdfQFQxnYDgDwxkYzsBwkSm6U+f+cGxv/PCp3hUMZ2A4A8MZGM7AcKdP0VmT7ez++SBXMJyB4QwMZ2A4A8NFpujZ2TI2Ic8+b7hqu4auYDgDwxkYzsBwBobbT9GzJ05kyXqWMDZXD15DVzCcgeEMDGdgOAPDXadowD0ML9N7yEddQ1cwnIHhDAxnYDgDw0XOi+7coY1Nraedj3dH0Z0qrmA4A8MZGM7AcAaGyznpru5e5djnZE22WdN41vUJfB9XMJyB4QwMZ2A4A8M9Arcf1E3Ip+1yxz75jrZnJF3BcAaGMzCcgeEMDHedojvf6Bcze2bdaafqbb+PKxjOwHAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNzpU3Rssq27V2T2HSuBE6RdwXAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNzpU3Rssq27V2T2HSuBE6RdwXAGhjMwnIHhDAwXmaJn3xUYU/d2xbo7rlOeiHQFwxkYzsBwBoYzMNx+ip49tSOm7uS92VOmA1zBcAaGMzCcgeEMDLd/d6GemisYzsBwBoYzMNwvxACCuNxIF1wAAAAASUVORK5CYII=" alt=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="projectImages">
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
