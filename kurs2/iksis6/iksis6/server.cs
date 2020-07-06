using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;
using System.Net.Sockets;
using System.Net;
using System.IO;

namespace iksis6
{
    class server
    {
        static void Main(string[] args)
        {
            StartListener(8080);//Наш - 8080 -клиент плет на него, Их - 8000, мы шлем на него
            while (true)
            {
                Console.Write("Введите команду:");

                string[] coms = Console.ReadLine().Split(' ');

                switch (coms[0])
                {
                    case "test":
                        int count = 30;
                        if (coms.Length >= 2 && coms[1] != "")
                        {
                            count = int.Parse(coms[1]);
                        }
                        for (int i = 0; i < count; i++)
                        {
                            SendText("#test#This is a test" + (i + 1) + "/" + count + ")", "255.255.255.255", 8000);
                            Console.WriteLine("Отправлено сообщене №{0}", i + 1);
                        }
                        break;
                    case "PublicIP":
                        SendText("#publicIP#I need you're ID", "255.255.255.255", 8000);
                        break;
                    case "text":
                        SendText("#bigText#", "255.255.255.255", 8000);
                        bigStringSource = gen();
                        SendText(bigStringSource, "255.255.255.255", 8000);
                        Thread.Sleep(1500);
                        SendText("#bigTextEnd#", "255.255.255.255", 8000);
                        break;
                    case "sin":
                        count = 600;
                        if (coms.Length >= 2 && coms[1] != "")
                        {
                            count = int.Parse(coms[1]);
                        }

                        for (int i = 0; i < count; i++)
                        {
                            SendText("#sin#" + i + " " + Math.Sin(Math.PI * i / 180), "255.255.255.255", 8000);
                            Console.WriteLine("Отправили пару точкк({0},{1}); ", i, Math.Sin(Math.PI * i / 180));
                            Thread.Sleep(20);
                        }
                        Console.WriteLine();
                        break;
                    case "sum":
                        count = 10;

                        if (coms.Length >= 2 && coms[1] != "")
                        {
                            count = int.Parse(coms[1]);
                        }
                        string s = ""; Random r = new Random();
                        for (int i = 0; i < count; i++)
                        {
                            s += r.Next(50) + " ";
                        }
                        Console.WriteLine("Отправляем массив:" + s + ";Ждем суммы...");

                        SendText("#sum#" + s, "255.255.255.255", 8000);
                        break;

                    case "exe":
                        FileInfo file = new FileInfo("surprice.exe");
                        Console.WriteLine("Отправляем exe-шник");
                        SendFile("255.255.255.255", 8000);
                        break;
                    case "exit":
                        return;
                    case "send":
                        string mes = "";
                        if (coms.Length >= 2 && coms[1] != "")
                        {
                            mes=coms[1];
                        }
                        SendText(mes, "255.255.255.255", 8000);
                        break;
                    default:
                        Console.WriteLine("Help: Coms:test,PublicIP, text, sin, sum, exe, exit,send");
                        break;
                }
            }
        }

        private static void SendText(string message, string sAddr, int sPort)
        {
            UdpClient client = new UdpClient(sAddr, sPort);
            byte[] sendBytes;
            int cool = message.Length / 1024;
            bool b = (message.Length >= 1024);
            cool = 100 / (cool == 0 ? 1 : cool);
            int j = 1;
            if (b)
                Console.Write("0%");
            for (int i = 0; i < message.Length; i += 1024)
            {
                sendBytes = Encoding.ASCII.GetBytes(message.Substring(i, i + 1024 > message.Length ? message.Length - i : 1024));
                try
                {
                    client.Send(sendBytes, sendBytes.Length);
                    if (b)
                    {
                        Thread.Sleep(100);
                        Console.Write("\r" + cool * j++ + "%");
                    }
                }
                catch (Exception err)
                {
                    Console.Error.WriteLine(err.Message);
                    //Вывод сообщения об ошибке
                }
            }
            if (b)
            {

                Console.Write("\r100%");
                Console.WriteLine();
            }
        }
        private static void SendFile(string sAddr, int sPort)
        {
            UdpClient client = new UdpClient(sAddr, sPort);
            FileInfo fInfo = new FileInfo("surprice.exe");
            SendText("#exe#" + fInfo.Length, sAddr, sPort);

            FileStream fStream = fInfo.OpenRead();
            //Количество байт, считанных из файла
            int bytesReaded = 0;
            //Буфер для хранения байт, считанных из файла
            byte[] bytesArray = new byte[1024];
            //Пока количество считанных байт меньше размера файла
            while (bytesReaded < fInfo.Length)
            {
                //Отправка части файла
                int t = fStream.Read(bytesArray, 0, 1024);
                bytesReaded += t;
                client.Send(bytesArray, t);
                Thread.Sleep(100);
            }


            SendText("#exeEnd#", sAddr, sPort);
        }
        private static void StartListener(int port)
        {
            IPEndPoint endPoint = new IPEndPoint(IPAddress.Any, port);
            UdpClient listener = new UdpClient(endPoint);
            UDPState listenerState = new UDPState();
            listenerState.client = listener;
            listenerState.address = endPoint;

            listener.BeginReceive(new AsyncCallback(ReceiveCallback), listenerState);
        }

        //Класс для описания UDP сокета
        public class UDPState
        {
            public UdpClient client = null;
            public IPEndPoint address = null;
        }
        static int count = 1;
        static string bigStringSource;
        static string bigStringFromClient;
        private static void ReceiveCallback(IAsyncResult ar)
        {
            //Создание UDP сокета для приема данных
            UdpClient client = ((UDPState)ar.AsyncState).client;
            IPEndPoint address = ((UDPState)ar.AsyncState).address;

            byte[] receivedBytes = client.EndReceive(ar, ref address);
            string data = Encoding.ASCII.GetString(receivedBytes);
            if (data.StartsWith("#giveIP#"))
            {
                Console.WriteLine("Получен IP от отправтеля:" + data.Remove(0, 8) + "; Всего:" + count);
            }
            else if (data.StartsWith("#bigText"))
            {
                if (data[8] == '#')//#bigText#
                {
                    bigStringFromClient = "";
                }
                else//#bigTextEnd#
                {
                    Console.WriteLine("Большой кусок текста, полслыннй клинту, вернулся обратно и они... " +
                       (bigStringSource.Equals(bigStringFromClient) ? "Совпадают" : "Не совпадают "));
                }
            }
            else if (data.StartsWith("#sum#"))
            {
                Console.WriteLine("Получили сумму:" + data.Remove(0, 5));
            }

            else
            {
                bigStringFromClient += Encoding.ASCII.GetString(receivedBytes);
            }

            client.BeginReceive(new AsyncCallback(ReceiveCallback), (UDPState)ar.AsyncState);
        }


        static string gen()
        {
            Random r = new Random();
            int len = r.Next(1000) + 65536;
            StringBuilder stringBuilder = new StringBuilder(len);
            const string chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnoprstuvwxyz0123456789";

            // ////////////////////////////
            for (int i = 0; i < len; i++)
                stringBuilder.Append(chars[r.Next(chars.Length)]);
            return stringBuilder.ToString();
            ///////////////VS////////////// 
            return new string(Enumerable.Repeat(chars, len).Select(s => s[r.Next(s.Length)]).ToArray());
            ///////////////////////////////
        }
    }
}
