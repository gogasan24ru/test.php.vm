# test.php.vm
### Задание

Необходимо разработать структуру для хранения данных (таблицы mySQL) и
класс (native PHP5, ORM решения не использовать).

Оперируемые данные
1. Существует древовидная структура данных (А) уровень вложенности
которых не ограничен.
2. К каждому из элементов структуры (А) может принадлежать
неограниченное количество данных (B)

Функционал класса
1. Одна из основных задач класса - выборка всех (B) по узлу (А) с учетом всех
вложенных в него веток: на рисунке идентификатор Node_X - нужно получить
все (B) принадлежащие основному узлу и всем вложенным в него (выделены
волнистой линией)
2. Структура хранения и механизмы оптимизации должны быть направлены на
минимизацию нагрузок в режиме чтения. При этом запись и изменение
структуры могут быть ресурсоемким, но технически осуществимыми при любых
уровнях вложенности и объемах данных.

В качестве примеров струкутры А и данных B может быть использовано:
 - Папки на диске (A) и файлы в них (B)
 - разделы справки (А) и статьи (В)

### Запуск демонстрации
* Требуется создать config.php с валидными данными для подключения к mysql из предложенного щаблона
* php  main.php
