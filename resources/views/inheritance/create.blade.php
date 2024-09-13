<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相続人情報の入力</title>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .add-child-btn {
            margin: 15px 0;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .add-child-btn:hover {
            background-color: #0056b3;
        }
        .child-container {
            margin-bottom: 20px;
        }
        .remove-child-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        h5{
            font-weight:normal;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let childIndex = 1;
            let divorcedChildIndex = 1; // 定義追加
            const addChildBtn = document.getElementById('add-child');
            const childContainer = document.getElementById('child-container');

            addChildBtn.addEventListener('click', function() {
                childIndex++;
                const newChildForm = `
                    <div class="child-form" id="child-${childIndex}">
                        <h3>子供${childIndex}</h3>
                        <div class="form-group">
                            <label for="child_name_${childIndex}">氏名(必須)</label>
                            <input type="text" name="children[${childIndex}][name]" id="child_name_${childIndex}" required>
                        </div>
                        <div class="form-group">
                            <label for="child_address_${childIndex}">住所</label><h5><span style="color:red; font-weight:bold;">住民票通りの住所</span>を入力して下さい。</h5>
                            <input type="text" name="children[${childIndex}][address]" id="child_address_${childIndex}" >
                        </div>
                        <div class="form-group">
                            <label for="child_birthdate_era_${childIndex}">生年月日（和暦）(必須)</label>
                            <select name="children[${childIndex}][birthdate][era]" id="child_birthdate_era_${childIndex}" required>
                                <option value="令和">令和</option>
                                <option value="平成">平成</option>
                                <option value="昭和">昭和</option>
                                <option value="大正">大正</option>
                                <option value="明治">明治</option>
                            </select>
                            <input type="number" name="children[${childIndex}][birthdate][year]" id="child_birthdate_year_${childIndex}" placeholder="年" required>
                            <input type="number" name="children[${childIndex}][birthdate][month]" id="child_birthdate_month_${childIndex}" placeholder="月" required>
                            <input type="number" name="children[${childIndex}][birthdate][day]" id="child_birthdate_day_${childIndex}" placeholder="日" required>
                        </div>
                        <div class="form-group">
                            <label for="child_relationship_${childIndex}">続柄(必須)</label>
                            <input type="text" name="children[${childIndex}][relationship]" id="child_relationship_${childIndex}" required>
                        </div>
                        <div>
                            <input type="radio" id="applicant_self_child_${childIndex}" name="applicant" value="child${childIndex}" required>
                            <label for="applicant_self_child_${childIndex}">申出人である</label><h5>（必ず一人選んでください）</h5>
                        </div>
                    </div>
                `;
                childContainer.insertAdjacentHTML('beforeend', newChildForm);
                this.style.display = "none";
            });

            const addDivorcedChildBtn = document.getElementById('add-divorced-child');
            const divorcedChildContainer = document.getElementById('divorced-child-container');

            addDivorcedChildBtn.addEventListener('click', function() {
                divorcedChildIndex++;
                const newDivorcedChildForm = `
                    <div class="child-form" id="divorced-child-${divorcedChildIndex}">
                        <h3>離婚した子供${divorcedChildIndex}</h3>
                        <div class="form-group">
                            <label for="divorced_child_name_${divorcedChildIndex}">氏名(必須)</label>
                            <input type="text" name="divorced_children[${divorcedChildIndex}][name]" id="divorced_child_name_${divorcedChildIndex}" required>
                        </div>
                        <div class="form-group">
                            <label for="divorced_child_address_${divorcedChildIndex}">住所</label><h5><span style="color:red; font-weight:bold;">住民票通りの住所</span>を入力して下さい。</h5>
                            <input type="text" name="divorced_children[${divorcedChildIndex}][address]" id="divorced_child_address_${divorcedChildIndex}" >
                        </div>
                        <div class="form-group">
                            <label for="divorced_child_birthdate_era_${childIndex}">生年月日（和暦）(必須)</label>
                            <select name="divorced_children[${divorcedChildIndex}][birthdate][era]" id="divorced_child_birthdate_era_${divorcedChildIndex}" required>
                                <option value="令和">令和</option>
                                <option value="平成">平成</option>
                                <option value="昭和">昭和</option>
                                <option value="大正">大正</option>
                                <option value="明治">明治</option>
                            </select>
                            <input type="number" name="divorced_children[${divorcedChildIndex}][birthdate][year]" id="divorced_child_birthdate_year_${divorcedChildIndex}" placeholder="年" required>
                            <input type="number" name="divorced_children[${divorcedChildIndex}][birthdate][month]" id="divorced_child_birthdate_month_${divorcedChildIndex}" placeholder="月" required>
                            <input type="number" name="divorced_children[${divorcedChildIndex}][birthdate][day]" id="divorced_child_birthdate_day_${divorcedChildIndex}" placeholder="日" required>
                        </div>
                        <div class="form-group">
                            <label for="divorced_child_relationship_${divorcedChildIndex}">続柄(必須)</label>
                            <input type="text" name="divorced_children[${divorcedChildIndex}][relationship]" id="divorced_child_relationship_${divorcedChildIndex}" required>
                        </div>
                    </div>
                `;
                divorcedChildContainer.insertAdjacentHTML('beforeend', newDivorcedChildForm);
                this.style.display = "none";
            });
        });
        </script>
</head>
<body>
    <div class="container">
        <h1>被相続人、配偶者、子供の情報を入力してください</h1>
        <form action="{{ route('pdf_in',['id'=>$style]) }}" method="GET">
        @csrf
        <div class="title">
        <!-- 被相続人情報 -->
            <h2>被相続人情報</h2>
            <div class="form-group">
                <label for="decedent_name">氏名(必須)</label>
                <input type="text" name="decedent[name]" id="decedent_name" required>
            </div>
            <div class="form-group">
                <label for="decedent_last_address">最後の住所(必須)</label><h5>一緒に提出する<span style="color:red; font-weight:bold;">住民票通りの住所</span>に入力してくだい<h5>
                <input type="text" name="decedent[last_address]" id="decedent_last_address" required>
            </div>
            <div class="form-group">
                <label for="decedent_last_domicile">最後の本籍(必須)</label><h5>一緒に提出する<span style="color:red; font-weight:bold;">戸籍通りの住所</span>に入力して下さい</h5>
                <input type="text" name="decedent[last_domicile]" id="decedent_last_domicile" required>
            </div>
            <div class="form-group">
                <label for="decedent_birthdate_era">生年月日（和暦）(必須)</label>
                <select name="decedent[birthdate][era]" id="decedent_birthdate_era" required>
                    <option value="令和">令和</option>
                    <option value="平成">平成</option>
                    <option value="昭和">昭和</option>
                    <option value="大正">大正</option>
                    <option value="明治">明治</option>
                </select>
                <input type="number" name="decedent[birthdate][year]" id="decedent_birthdate_year" placeholder="年" required>
                <input type="number" name="decedent[birthdate][month]" id="decedent_birthdate_month" placeholder="月" required>
                <input type="number" name="decedent[birthdate][day]" id="decedent_birthdate_day" placeholder="日" required>
            </div>
            <div class="form-group">
                <label for="decedent_deathdate_era">死亡日（和暦）(必須)</label>
                <select name="decedent[deathdate][era]" id="decedent_deathdate_era" required>
                    <option value="令和">令和</option>
                    <option value="平成">平成</option>
                    <option value="昭和">昭和</option>
                    <option value="大正">大正</option>
                    <option value="明治">明治</option>
                </select>
                <input type="number" name="decedent[deathdate][year]" id="decedent_deathdate_year" placeholder="年" required>
                <input type="number" name="decedent[deathdate][month]" id="decedent_deathdate_month" placeholder="月" required>
                <input type="number" name="decedent[deathdate][day]" id="decedent_deathdate_day" placeholder="日" required>
            </div>
        </div>
        <div class="partner">
            <!-- 配偶者情報 -->
            <h2>配偶者情報</h2>
            <div class="form-group">
                <label for="spouse_name">氏名(必須)</label>
                <input type="text" name="spouse[name]" id="spouse_name" required>
            </div>
            <div class="form-group">
                <label for="spouse_address">住所</label><h5><span style="color:red; font-weight:bold;">住民票通りの住所</span>を入力して下さい。</h5>
                <input type="text" name="spouse[address]" id="spouse_address" >
            </div>
            <div class="form-group">
                <label for="spouse_birthdate_era">生年月日（和暦）(必須)</label>
                <select name="spouse[birthdate][era]" id="spouse_birthdate_era" required>
                    <option value="令和">令和</option>
                    <option value="平成">平成</option>
                    <option value="昭和">昭和</option>
                    <option value="大正">大正</option>
                    <option value="明治">明治</option>
                </select>
                <input type="number" name="spouse[birthdate][year]" id="spouse_birthdate_year" placeholder="年" required>
                <input type="number" name="spouse[birthdate][month]" id="spouse_birthdate_month" placeholder="月" required>
                <input type="number" name="spouse[birthdate][day]" id="spouse_birthdate_day" placeholder="日" required>
            </div>
            <div class="form-group">
                <label for="spouse_relationship">続柄(必須)</label>
                <input type="text" name="spouse[relationship]" id="spouse_relationship" value="" placeholder="続柄を入力してください" required>
            </div>
            <div>
            <input type="radio" id="applicant_self_spouse" name="applicant" value="spouse" required>
            <label for="applicant_self_spouse">申出人である</label><h5>（必ず一人選んでください）</h5>
        </div>
        </div>
        <div class="children">
            <!-- 子供情報 -->
            <h2>子供情報</h2>
            <div id="child-container">
                <div class="child-form" id="child-1">
                    <h3>子供1</h3>
                    <div class="form-group">
                        <label for="child_name_1">氏名(必須)</label>
                        <input type="text" name="children[1][name]" id="child_name_1" required>
                    </div>
                    <div class="form-group">
                        <label for="child_address_1">住所</label><h5><span style="color:red; font-weight:bold;">住民票通りの住所</span>を入力して下さい。</h5>
                        <input type="text" name="children[1][address]" id="child_address_1" >
                    </div>
                    <div class="form-group">
                        <label for="child_birthdate_era_1">生年月日（和暦）(必須)</label>
                        <select name="children[1][birthdate][era]" id="child_birthdate_era_1" required>
                            <option value="令和">令和</option>
                            <option value="平成">平成</option>
                            <option value="昭和">昭和</option>
                            <option value="大正">大正</option>
                            <option value="明治">明治</option>
                        </select>
                        <input type="number" name="children[1][birthdate][year]" id="child_birthdate_year_1" placeholder="年" required>
                        <input type="number" name="children[1][birthdate][month]" id="child_birthdate_month_1" placeholder="月" required>
                        <input type="number" name="children[1][birthdate][day]" id="child_birthdate_day_1" placeholder="日" required>
                    </div>
                    <div class="form-group">
                        <label for="child_relationship_1">続柄(必須)</label>
                        <input type="text" name="children[1][relationship]" id="child_relationship_1" required>
                    </div>
                    <input type="radio" id="applicant_self_child_1" name="applicant" value="child1" required>
                    <label for="applicant_self_child_1">申出人である</label><h5>（必ず一人選んでください）</h5>
                </div>
            </div>
            <!-- 子供を追加するボタン -->
            <button type="button" id="add-child" class="add-child-btn">子供を追加</button>

        </div>
    @if($style > 1)
    <!-- 元配偶者の性別選択欄を追加 -->
    <div class="form-group">
        <label for="former_spouse_gender">元配偶者の性別</label>
        <select name="former_spouse[gender]" id="former_spouse_gender" required>
            <option value="">選択してください(必須)</option>
            <option value="female">元妻</option>
            <option value="male">元夫</option>
        </select>
    </div>
    <div class="children">
            <!-- 離婚した子供情報 -->
            <h2>離婚した子供情報</h2>
            <div id="divorced-child-container">                
                <div class="child-form" id="divorced-child-1">
                    <h3>離婚した子供1</h3>
                    <div class="form-group">
                        <label for="divorced_child_name_1">氏名(必須)</label>
                        <input type="text" name="divorced_children[1][name]" id="divorced_child_name_1" required>
                    </div>
                    <div class="form-group">
                        <label for="divorced_child_address_1">住所</label><h5><span style="color:red; font-weight:bold;">住民票通りの住所</span>を入力して下さい。</h5>
                        <input type="text" name="divorced_children[1][address]" id="divorced_child_address_1" >
                    </div>
                    <div class="form-group">
                        <label for="divorced_child_birthdate_era_1">生年月日（和暦）(必須)</label>
                        <select name="divorced_children[1][birthdate][era]" id="divorced_child_birthdate_era_1" required>
                            <option value="令和">令和</option>
                            <option value="平成">平成</option>
                            <option value="昭和">昭和</option>
                            <option value="大正">大正</option>
                            <option value="明治">明治</option>
                        </select>
                        <input type="number" name="divorced_children[1][birthdate][year]" id="divorced_child_birthdate_year_1" placeholder="年" required>
                        <input type="number" name="divorced_children[1][birthdate][month]" id="divorced_child_birthdate_month_1" placeholder="月" required>
                        <input type="number" name="divorced_children[1][birthdate][day]" id="divorced_child_birthdate_day_1" placeholder="日" required>
                    </div>
                    <div class="form-group">
                        <label for="divorced_child_relationship_1">続柄(必須)</label>
                        <input type="text" name="divorced_children[1][relationship]" id="divorced_child_relationship_1" required>
                    </div>
                </div>
            </div>
            @if($style==3)
            <!-- 子供を追加するボタン -->
            <button type="button" id="add-divorced-child" class="add-child-btn">離婚した子供を追加</button>
            @endif
            </div>
    </div>
    @endif
        <!-- 送信ボタン -->
        <button type="submit">作成</button>
    </form>
    <button onclick="location.reload();">やり直し</button>
</body>
</html>