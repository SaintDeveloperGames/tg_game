import asyncio
import os
import mysql.connector
from aiogram import Bot, Dispatcher, types
from aiogram.filters.command import Command
from aiogram.types.web_app_info import WebAppInfo

token = os.environ.get("TOKEN")
password = os.environ.get("PASSWD")
mysql_user = os.environ.get("USER")

async def mysqlConnect(id, first_name, max_score):
    try:
        db = mysql.connector.connect( #Меняем на своё
            host='192.168.0.103',
            user=root,
            passwd=password,
            database='db_tg'
        )
        mycursor = db.cursor()
        add_users = 'INSERT IGNORE INTO users (id, first_name, max_score) VALUES (%s, %s, %s)'
        user_data = (id, first_name, max_score)
        mycursor.execute(add_users, user_data)
        db.commit()
    except mysql.connector.Error as err:
        print(f"Error: {err}")
    finally:
        db.close()

bot = Bot(token)
dp = Dispatcher()

#Можно убрать эту кнопку
play = types.InlineKeyboardMarkup(inline_keyboard=[
    [types.InlineKeyboardButton(text="Play", web_app=WebAppInfo(url="https://game.domain.ru"))]
])

@dp.message(Command("start"))
async def cmd_start(message: types.Message):
    await mysqlConnect(message.from_user.id, message.from_user.first_name, 0)
    await message.answer('Game', reply_markup=play)

async def main():
    await dp.start_polling(bot)

if __name__ == "__main__":
    try:
        asyncio.run(main())
    except KeyboardInterrupt:
        print('Exit')
