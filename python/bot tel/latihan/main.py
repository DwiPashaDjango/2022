import telebot

bot = telebot.TeleBot('5755917989:AAFK2WpTWHB65lfYGqIJ-_eVhbRqg59FWLc')

@bot.message_handler(commands=['start'])
def welcome(message):
    bot.reply_to(message, 'Hallo')