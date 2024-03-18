# fib_api
処理面<br>
「本番環境のURL/fib」でアクセスすると、nという値から求めたフィボナッチ数列を返すresearchFibonacciというメソッドにアクセスします。

researchFibonacciメソッドの中では、まず$requestnumberにリクエストのnという数値を代入します。
その次に条件として、「リクエストの値が数値に変換できる値である」「数値が0以上である」という2つの条件を満たす場合に処理を行います。
もし、この条件を満たさない場合には、エラーステータス400という値とともに、Json形式でエラーメッセージを返すように処理を行います。

前述の条件を満たしている処理の中では、フィボナッチ数列は2つ前の項と1つ前の項を足した値なので、最初の処理でエラーが起こらないように、先頭とその次の値は初期値として代入しました。
フィボナッチ数列の値がintger型の最大値を超えると、正しい値で処理できなくなるため、BigInger型にして、計算を行いました。
ループ処理が終わった後は、戻り値としてJson形式で'result'というキーに対して、リクエストの値に対応したフィボナッチ数列を返すようになっております。


テスト面<br>
テストコードはtests/Feature/FibonacciTest.phpというファイルに記述してあります。
今回はapiを踏んで実際のリクエストを通して処理が正しく処理されているか確認するテストを記述しました。
現在テストはどれも正しく通るものになっています。<br>
テストした項目については以下の通りです。<br>
・リクエストの値が大きい数値でも正しく処理されるか<br>
・リクエストの値が0の場合でも正しく処理されるか<br>
・リクエストの値が文字列の場合にエラーを返すか<br>
・リクエストの値が負の数の場合にエラーを返すか<br>
