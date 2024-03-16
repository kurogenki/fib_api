<html>
    <form action="/fib" method="get">
        @csrf
        <label>求めたいフィボナッチ数列の値nを入力して下さい</label>
        <input name="n" type="number">
        <input type="submit"/>
    </form>
</html>
